<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\RequestMiddleware;

Route::middleware(RequestMiddleware::class)->group(function(){
    Route::prefix("/users")->group(function() {
        Route::get("/",[UsersController::class, "get_users"]);
        Route::post("/",[UsersController::class, "create_user"]);
        Route::post("/{id}",[UsersController::class, "update_user"]);
        Route::get("/{id}",[UsersController::class, "delete_user"]);
    });
    
    Route::prefix("/projects")->group(function() {
        Route::get("/",[UsersController::class, "get_projects"]);
        Route::post("/",[UsersController::class, "create_project"]);
        Route::post("/{id}",[UsersController::class, "update_project"]);
        Route::get("/{id}",[UsersController::class, "delete_project"]);
    });
});

