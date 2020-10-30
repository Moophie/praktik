<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;


class CompanyController extends Controller
{
    public function index()
    {
        $data['companies'] = \Illuminate\Support\Facades\DB::table('companies')->get();
        return view('companies/index', $data);
    }

    public function show($company)
    {
        $data['company'] = \App\Models\Company::where('id', $company)->first();
        return view('companies/show', $data);
    }

    public function create()
    {
        return view('companies/create');
    }

    public function store(Request $request)
    {
        /*$validation = $request->validate([
            'name'  => 'required|max:200',
            'bio'   => 'required'
        ]);*/

        $request->flash();

        $company = new \App\Models\Company();
        $company->user_id = $request->input('user_id');
        $company->name = $request->input('name');
        $company->city = $request->input('city');
        $company->address = $request->input('address');
        $company->geolat = $request->input('geolat');
        $company->geolng = $request->input('geolng');
        $company->logo = $request->input('logo');
        $company->website = $request->input('website');
        $company->description = $request->input('description');
        $company->email = $request->input('email');
        $company->phone = $request->input('phone');
        $company->rating = 1;

        $lat = $company->geolat;
        $lng = $company->geolng;

        $nearest_station = DB::select("SELECT name, SQRT(POW(111.2 * (latitude - $lat), 2) + POW(111.2 * ($lng - longitude) * COS(latitude / 57.3), 2)) 
        AS distance FROM stations ORDER BY distance LIMIT 1");

        $pubtrans_score = 0;

        if ($nearest_station[0]->distance < 2) {
            $pubtrans_score += 1;
        }

        $company->pubtrans_score = $pubtrans_score;

        $company->save();

        /*$request->session()->flash('message', 'Artist saved');
        //$request->session()->put('message', 'Permanent message');
        //$request->session()->pull('message', 'Permanent message');*/

        return redirect('/companies');
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
