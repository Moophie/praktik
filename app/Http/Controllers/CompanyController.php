<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $company->rating = 0;

        $company->save();

        /*$request->session()->flash('message', 'Artist saved');
        //$request->session()->put('message', 'Permanent message');
        //$request->session()->pull('message', 'Permanent message');*/

        return redirect('/companies');
    }

}
