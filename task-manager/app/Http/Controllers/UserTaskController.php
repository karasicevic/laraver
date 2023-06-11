<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class UserTaskController extends Controller
{

    public function index($user_id){    
        $tasks = Task::get()->where('user_id', $user_id);
        if(is_null($taks)){
            return response()->json('Data not found', 404);
        }
        return response()->json($tasks);
    }

}
