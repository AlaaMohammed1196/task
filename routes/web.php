<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\AuthController;

Route::prefix('/')->middleware('auth')->group(function () {
    Route::get('logout',[AuthController::class,'UserLogout']);
    Route::post('course/subscribe/{id}',[HomeController::class,'subscribe'])->name('courses.subscribe');
});

Route::prefix('/')->middleware('guest:teacher,admin,web')->group(function () {
    Route::get('login', [AuthController::class,'showLoginFormUser'])->name('login');
    Route::post('login', [AuthController::class,'login'])->name('doLogin');
});

Route::get('/',function (){
    return view('welcome');
});
