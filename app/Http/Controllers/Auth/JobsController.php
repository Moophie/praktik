<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index(){
        $data['jobs'] = \DB::table('jobs')->get();
        return view('jobs/index', $data);
    }

    public function show($job){
        $job = \App\Models\Job::where('id', $job)->with('applications')->first();
        dd($job);
    }
}
