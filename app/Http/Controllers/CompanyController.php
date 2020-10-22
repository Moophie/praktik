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
        $company->name = $request->input('name'); 
        $company->bio = $request->input('bio');
        $company->bio = $request->input('bio');
        $company->bio = $request->input('bio');
        $company->bio = $request->input('bio');
        $company->bio = $request->input('bio');
        $company->bio = $request->input('bio');

        $company->save();

        /*$request->session()->flash('message', 'Artist saved');
        //$request->session()->put('message', 'Permanent message');
        //$request->session()->pull('message', 'Permanent message');*/

        return redirect('/companies');
    }

}
