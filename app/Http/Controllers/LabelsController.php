<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class LabelsController extends Controller
{
    public function put(Request $request, $application)
    {
        $data['label'] = Application::where('applications.id', $application)->update(['applications.label_id' => $request->input('label')]);
        
        return redirect('applications');
    }
}
