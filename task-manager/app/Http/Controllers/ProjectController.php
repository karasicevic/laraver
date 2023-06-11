<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ProjectCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return new ProjectCollection($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'date' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $project = Project::create([
            'title' => $request->title,
            'description'=>$request->description,
            'date'=>$request->date
        ]);

        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'date' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $project->update([           
            'title' => $request->title,
            'description'=>$request->description,
            'date'=>$request->date
        ]);

        return new ProjectResource($project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json('Project deleted successfully.');
    }
}
