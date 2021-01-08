<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    public function index()
    {
        // Put all jobs from the database in an array
        $data['jobs'] = DB::table('jobs')->get();

        return view('jobs/index', $data);
    }

    public function show($job)
    {
        // Get the specific job with the given id and put it in an array
        // Optionally show all the applications for it
        $data['job'] = \App\Models\Job::where('id', $job)->with('company')->first();

        return view('jobs/show', $data);
    }

    public function create()
    {
        return view('jobs/create');
    }

    public function store(Request $request)
    {
        $job= new \App\Models\Job();
        $user = Auth::user();
        // Set object properties from the user input
        $job->name = $request->input('name');
        $job->description = $request->input('description');
        $job->start_date = $request->input('start_date');
        $job->company_id = $user->id;

        $job->save();
        
        return redirect('jobs');
    }
}
