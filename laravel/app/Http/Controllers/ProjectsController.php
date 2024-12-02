<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function get_projects(){
        $project = Project::all();
        return response()->json([
            "projects"=>$projects
        ],200);
    }
    public function create_project(Request $request){
        if(!$request->name || !$request->decription )
        {
            return response()->json([
                "message"=>"All fields are required"
            ],400);
        }
        $project = new project;
        $project->name=$request->name;
        $project->decription  = $request->decription ;
        $project->save();
        
        return response()->json([
            "message"=>"project created successfully",
            "project"=>$project
        ],201);

    }

    
}
