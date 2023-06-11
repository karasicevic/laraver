<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return new TaskCollection($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'done' => 'required',
            'user_id' => 'required',
            'project_id' => 'required',

        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $task = Task::create([
            'title' => $request->title,
            'description'=>$request->description,
            'done' => $request->done,
            'user_id' => $request->user_id,
            'project_id' => $request->project_id,
        ]);

        return response()->json(['Task created successfully', new TaskResource($task)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'done' => 'required',
            'user_id' => 'required',
            'project_id' => 'required',

        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $task = Task::update([
            'title' => $request->title,
            'description'=>$request->description,
            'done' => $request->done,
            'user_id' => $request->user_id,
            'project_id' => $request->project_id,
        ]);

        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json('Task deleted successfully.');
    }
}
