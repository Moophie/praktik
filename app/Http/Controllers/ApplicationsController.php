<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationsController extends Controller
{
    public function index()
    {
        // Put all applications from the database in an array
        $data['applications'] = DB::table('applications')->get();

        return view('applications/index', $data);
    }

    public function create()
    {
        return view('applications/create');
    }

    public function store(Request $request)
    {
        $application = new \App\Models\Application();

        // Set object properties from the user input
        $application->job_id = $request->input('job_id');
        $application->user_id = $request->input('user_id');
        $application->message = $request->input('message');
        // Set default label (new)
        $application->label_id = "1";

        $application->save();

        return redirect('applications');
    }

    public function filter(Request $request)
    {
        // TODO: function that filters out applications and returns the results
    }
}
