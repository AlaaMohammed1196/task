<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;

Route::prefix('/teachers')->middleware('auth:teacher')->group(function () {
    Route::get('logout',[AuthController::class,'TeacherLogout']);
});

Route::prefix('/teachers')->middleware('guest:teacher,admin,web')->group(function () {
    Route::get('/login', [AuthController::class,'showLoginFormTeacher']);
    Route::post('login', [AuthController::class,'login'])->name('doLogin');
});
