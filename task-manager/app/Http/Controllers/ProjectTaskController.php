<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{

    public function index($project_id){    
        $tasks = Task::get()->where('project_id', $project_id);
        if(is_null($taks)){
            return response()->json('Data not found', 404);
        }
        return response()->json($tasks);
    }

}
