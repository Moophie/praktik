<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function index(){
        $data['applications'] = \DB::table('applications')->get();
        return view('applications/index', $data);
    }
}
