<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationsController extends Controller
{
    public function index()
    {
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
        $application->job_id = $request->input('job_id');
        $application->user_id = $request->input('user_id');
        $application->message = $request->input('message');
        $application->label_id = "1";
        $application->save();
        return redirect('applications');
    }

    public function filter(Request $request)
    {
    }
}
