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
}
