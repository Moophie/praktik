<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index(){
        $data['jobs'] = \DB::table('jobs')->get();
        return view('jobs/index', $data);
    }

    public function show(\App\Job $job){
        $listing = $job;
        dd($listing);
    }
}
