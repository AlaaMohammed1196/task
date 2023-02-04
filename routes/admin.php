<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Teacher\TeacherRateController;

Route::prefix('/dashboard')->middleware('auth:admin')->group(function () {
    Route::resource('teachers',TeacherController::class);
    Route::resource('users',UserController::class);
    Route::get('logout',[AuthController::class,'AdminLogout']);
});

Route::prefix('/dashboard')->middleware(['guest:web,admin,teacher'])->group(function () {
    Route::get('/login', [AuthController::class,'showLoginFormAdmin']);
    Route::post('login', [AuthController::class,'login'])->name('doLogin');
});

Route::resource('dashboard/courses',CourseController::class)->middleware('auth:admin,teacher,web');
Route::get('dashboard/subscribe/courses/{id}',[UserController::class,'subscribe_course'])->middleware('auth:admin,teacher');
Route::post('dashboard/rate/user',[TeacherRateController::class,'RateUser'])->middleware('auth:admin,teacher')->name('rate.store');
Route::get('dashboard/get/begin_aiya',[TeacherRateController::class,'begin_aiya'])->middleware('auth:admin,teacher')->name('get.begin_aiya');
Route::get('dashboard/get/end_aiya',[TeacherRateController::class,'end_aiya'])->middleware('auth:admin,teacher')->name('get.end_aiya');
Route::get('dashboard/get/wageh',[TeacherRateController::class,'wageh'])->middleware('auth:admin,teacher')->name('get.wageh');



