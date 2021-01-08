<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    public function index()
    {
        // Put all jobs from the database in an array
        $data['jobs'] = Job::all();

        return view('jobs/index', $data);
    }

    public function show($job)
    {
        // Get the specific job with the given id and put it in an array
        // Optionally show all the applications for it
        $data['job'] = Job::where('id', $job)->with('company')->first();

        return view('jobs/show', $data);
    }

    public function create()
    {
        return view('jobs/create');
    }

    public function store(Request $request)
    {
        $job= new Job();
        $user = Auth::user();
        // Set object properties from the user input
        $job->name = $request->input('name');
        $job->description = $request->input('description');
        $job->start_date = $request->input('start_date');
        $job->company_id = $user->id;

        $job->save();
        
        return redirect('jobs');
    }

    public function filterJobs()
    {
        // This needs to be the starting point of building your query
        // Leaving it empty does not work
        $parameters = "WHERE 1=1";

        // Get the user's filters through the GET request
        // Add the relevant filters to the parameter string
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
        
        // Construct the query
        $query = "SELECT jobs.*, companies.name AS compname, companies.rating, companies.pubtrans_score FROM jobs
        INNER JOIN companies ON jobs.company_id = companies.id " . $parameters ." LIMIT 10";

        // Execute the query
        $jobs = DB::select($query);

        return view('index', ['jobs' => $jobs]);
    }
}
