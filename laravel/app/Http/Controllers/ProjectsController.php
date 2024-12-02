<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function get_projects(){
        $projects = Project::all();
        $members=[];
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

    public function update_project(Request $request,$id){
        if(!$request->name || !$request->decription  )
        {
            return response()->json([
                "message"=>"All fields are required"
            ],400);
        }
        $project = project::find($id);
        if(!$project)
        {
            return response()->json([
                "message"=>"project not found"
            ],404);
        }
        $project->name= $request->name;
        $project->decription  = $request->decription ;
        $project->save();
        return response()->json([
            "message"=>"project updated successfully",
            "project"=>$project
        ],200);

    }
    public function delete_project($id){
        $project = project::find($id)->delete();
        
        return response()->json([
            "message"=>"project deleted successfully",
            "deleted_project"=>$project
        ],201);

    }
}
