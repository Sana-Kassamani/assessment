<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::prefix("/users")->group(function() {
    Route::get("/",[UsersController::class, "get_users"]);
    Route::post("/",[UsersController::class, "create_user"]);
    Route::post("/{id}",[UsersController::class, "update_user"]);
    Route::get("/{id}",[UsersController::class, "delete_user"]);
});

