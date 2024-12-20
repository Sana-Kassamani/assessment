<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function get_users(){
        $users = User::all();
        return response()->json([
            "users"=>$users
        ],200);
    }
    public function create_user(Request $request){
        if(!$request->name || !$request->color )
        {
            return response()->json([
                "message"=>"All fields are required"
            ],400);
        }
        $user = new User;
        $user->name=$request->name;
        $user->color = $request->color;
        $user->save();
        
        return response()->json([
            "message"=>"User created successfully",
            "user"=>$user
        ],201);

    }

    public function update_user(Request $request,$id){
        if(!$request->name || !$request->color )
        {
            return response()->json([
                "message"=>"All fields are required"
            ],400);
        }
        $user = User::find($id);
        if(!$user)
        {
            return response()->json([
                "message"=>"User not found"
            ],404);
        }
        $user->name= $request->name;
        $user->color = $request->color;
        $user->save();
        return response()->json([
            "message"=>"User updated successfully",
            "user"=>$user
        ],200);

    }
    public function delete_user($id){
        $user = User::find($id)->delete();
        
        return response()->json([
            "message"=>"User deleted successfully",
            "deleted_user"=>$user
        ],201);

    }


    
}
