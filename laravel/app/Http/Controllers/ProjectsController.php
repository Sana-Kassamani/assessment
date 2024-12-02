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
    
}
