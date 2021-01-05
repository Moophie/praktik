<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        // Put all companies from the database in an array
        $data['companies'] = DB::table('companies')->get();

        return view('companies/index', $data);
    }

    public function show($company)
    {
        // Get the specific company with the given id and put it in an array
        $data['company'] = Company::where('id', $company)->first();

        $lat = $data['company']->geolat;
        $lng = $data['company']->geolng;

        $data['nearest_station'] = DB::select("SELECT name, SQRT(POW(111.2 * (latitude - $lat), 2) + POW(111.2 * ($lng - longitude) *
        COS(latitude / 57.3), 2)) AS distance FROM stations ORDER BY distance LIMIT 1");

        return view('companies/show', $data);
    }

    public function create()
    {
        return view('companies/create');
    }

    public function store(Request $request)
    {
        /* $validation = $request->validate([
            'name'  => 'required|max:200',
            'bio'   => 'required'
        ]);

        $request->flash(); */

        $company = new Company();

        // Set object properties from the user input
        $company->user_id = $request->input('user_id');
        $company->name = $request->input('name');
        $company->city = $request->input('city');
        $company->address = $request->input('address');
        $company->geolat = $request->input('geolat');
        $company->geolng = $request->input('geolng');

        if ($request->hasFile('logo')) {
            $filename = "logo_" . $company->name . "_" . $company->address;
            $request->logo->storeAs('/companies/images', $filename, 'public');
            $company->logo = $filename;
        }

        $company->website = $request->input('website');
        $company->description = $request->input('description');
        $company->email = $request->input('email');
        $company->phone = $request->input('phone');

        // Default company rating is 1
        // TODO: Add "unrated" or NULL option
        $company->rating = 1;

        // Calculate the public transport score
        $company->pubtrans_score = $company->calcPubTransScore($company->geolat, $company->geolng);

        $company->save();

        /*$request->session()->flash('message', 'Artist saved');
        //$request->session()->put('message', 'Permanent message');
        //$request->session()->pull('message', 'Permanent message');*/

        return redirect('/companies');
    }

    public function showProfile()
    {
        $data['company'] = Company::where('user_id', Auth::user()->id)->first();

        return view("companies/profile", $data);
    }

    public function updateProfile(Request $request)
    {
        Company::where('user_id', Auth::user()->id)
        ->update(['name' => $request->input('name'), 'city' => $request->input('city'), 'address' => $request->input('address'), 'geolat' => $request->input('geolat'), 'geolng' => $request->input('geolng'), 'logo' => $request->input('logo'), 'website' => $request->input('website'), 'email' => $request->input('email'), 'description' => $request->input('description'), 'phone' => $request->input('phone')]);
        return redirect('/companyprofile');
    }

    public function getCompanyInfo(Request $request)
    {
        $city = $request->input('city');
        $name = $request->input('name');

        $venue = Http::get("https://api.foursquare.com/v2/venues/search", [
            'client_id' => env('FOURSQUARE_CLIENT_ID'),
            'client_secret' => env('FOURSQUARE_CLIENT_SECRET'),
            'v' => "20201022",
            'near' => $city,
            'query' => $name,
            'limit' => 1
        ])->json();

        $venueDetails = Http::get("https://api.foursquare.com/v2/venues/" . $venue['response']['venues'][0]['id'], [
            'client_id' => env('FOURSQUARE_CLIENT_ID'),
            'client_secret' => env('FOURSQUARE_CLIENT_SECRET'),
            'v' => "20201022"
        ])->json();

        return response($venueDetails);
    }
}
