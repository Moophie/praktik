<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationsController extends Controller
{
    public function index()
    {
        $data['applications'] = \App\Models\Application::with('user', 'job', 'label')->get();

        return view('applications/index', $data);
    }

    public function show($application)
    {
        $data['application'] = \App\Models\Application::where('applications.id', $application)->join('users', 'users.id', '=', 'applications.user_id')->first();

        return view('applications/show', $data);
    }

    public function create($job)
    {
        return view('applications/create', ['job'=>$job]);
    }

    public function store(Request $request, $job)
    {
        $application = new \App\Models\Application;

        // Set object properties from the user input
        $application->job_id = $job;
        $application->user_id = $request->input('user_id');
        $application->message = $request->input('message');
        // Set default label (new)
        $application->label_id = "1";

        $application->save();

        return redirect('applications');
    }

    /*public function filter(Request $request)
    {
        // TODO: function that filters out applications and returns the results
    }*/
}
