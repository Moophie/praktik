<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabelsController extends Controller
{
    public function put(Request $request, $application)
    {
        $data['label'] = \App\Models\Application::where('applications.id', $application)->update(['applications.label_id' => $request->input('label')]);
        return redirect('applications');
    }
}
