<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // If the user is a student, get all his applications
        if ($user->type === "student") {
            $data['applications'] = Application::with('user', 'job', 'label')->where('applications.user_id', '=', $user->id)->get();
        } else { // If the user is not a student, get all the applications made to the user's company
            $data['applications'] = Application::join('jobs', 'jobs.id', '=', 'applications.job_id')->join('users', 'users.id', '=', 'applications.user_id')->join('companies', 'jobs.company_id', '=', 'companies.id')->select('jobs.*', 'applications.*', 'users.id as user_id', 'users.*', 'applications.id as app_id')->where('companies.user_id', '=', $user->id)->get();
        }

        
        return view('applications/index', $data);
    }

    public function show($application)
    {
        $data['application'] = Application::where('applications.id', $application)->join('jobs', 'jobs.id', '=', 'applications.job_id')->join('companies', 'jobs.company_id', '=', 'companies.id')->join('users', 'users.id', '=', 'companies.user_id')->select('jobs.*', 'applications.*', 'users.id as company_id', 'users.firstname', 'users.lastname', 'users.portfolio', 'users.email', 'users.cv', 'applications.user_id as applicant_id')->first();

        return view('applications/show', $data);
    }

    public function create($job)
    {
        return view('applications/create', ['job' => $job]);
    }

    public function store(Request $request, $job)
    {
        $application = new Application;

        // Set object properties from the user input
        $application->job_id = $job;
        $application->user_id = Auth::user()->id;
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
