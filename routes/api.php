<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

 Route::post("/register",[App\Http\Controllers\AuthController::class,"register"]);   
 Route::post("/login",[App\Http\Controllers\AuthController::class,"login"]);
 Route::post("/students/store",[App\Http\Controllers\StudentController::class,"store"]);
 Route::get("/students",[App\Http\Controllers\StudentController::class,"index"]);
 Route::post("/course/store",[App\Http\Controllers\CourseController::class,"store"]);

