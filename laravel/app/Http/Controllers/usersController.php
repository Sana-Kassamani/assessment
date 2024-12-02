<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class usersController extends Controller
{
    public function get_users(){
        $users = User::all();
        return response()->json([
            "users"=>$users
        ],200);
    }
    
}
