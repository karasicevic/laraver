<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class ProjectTaskController extends Controller
{

    public function index($project_id){    
        $tasks = Task::get()->where('project_id', $project_id);
        if(is_null($tasks)){
            return response()->json('Data not found', 404);
        }
        return response()->json($tasks);
    }

}
