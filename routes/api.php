<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user'], function () {
    Route::post("/login", [UserController::class, 'login']);
    Route::post("/adminLogin", [UserController::class, 'adminLogin']);
    Route::post("/register", [UserController::class, 'register']);
    Route::get("/", [UserController::class, 'profile']);
    Route::get("/{id}", [UserController::class, 'findById']);
    Route::patch("/{id}", [UserController::class, 'edit']);
    Route::delete("/{id}", [UserController::class, 'delete']);
});
