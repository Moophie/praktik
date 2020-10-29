<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CompanyController extends Controller
{
    public function index()
    {
        // Put all companies from the database in an array
        $data['companies'] = \Illuminate\Support\Facades\DB::table('companies')->get();

        return view('companies/index', $data);
    }

    public function show($company)
    {
        // Get the specific company with the given id and put it in an array
        $data['company'] = \App\Models\Company::where('id', $company)->first();

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

        $company = new \App\Models\Company();

        // Set object properties from the user input
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
