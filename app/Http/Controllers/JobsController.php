<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // Set object properties from the user input
        $job->name = $request->input('name');
        $job->description = $request->input('description');
        $job->start_date = $request->input('start_date');
        $job->company_id = $request->input('company_id');

        $job->save();
        
        return redirect('jobs');
    }

    public function filterJobs()
    {
        $parameters = "WHERE 1=1";

        if (!empty($_GET)) {
            if (!empty($_GET['rating'])) {
                $parameters = $parameters . " AND companies.rating >= " . $_GET['rating'];
            }
            if (!empty($_GET['pubtrans_score'])) {
                $parameters = $parameters . " AND companies.pubtrans_score >= " . $_GET['pubtrans_score'];
            }
            if (!empty($_GET['start_date'])) {
                $parameters = $parameters . " AND jobs.start_date > '" . $_GET['start_date'] . "'";
            }
        }

        $query = "SELECT jobs.*, companies.name AS compname, companies.rating, companies.pubtrans_score FROM jobs
        INNER JOIN companies ON jobs.company_id = companies.id " . $parameters ." LIMIT 10";

        $jobs = DB::select($query);

        return view('index', ['jobs' => $jobs]);
    }
}
