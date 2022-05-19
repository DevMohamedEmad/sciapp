<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//AUTHENTICATION
Route::group(['middleware'=>'api'],function()
   {
   Route::post('/login',[App\Http\Controllers\Api\AuthController::class,'login']);
   Route::post('/logout',[App\Http\Controllers\Api\AuthController::class,'logout'])->middleware('auth.guard:student-api');

    });


    //STUDENT-PROFILE
    Route::group(['prefix' => 'profile','middleware'=>['api','auth.guard:student-api']],function()
    {
        Route::get('/show',[App\Http\Controllers\Api\profile_studentController::class,'index'])->name('profile');
    });

    //OPEN-COURSE
    Route::group(['prefix' => 'open_course','middleware'=>['api','auth.guard:student-api']],function()
    {
        Route::post('/store', [App\Http\Controllers\OpenCourseController::class,'store']);
        Route::post('/show', [App\Http\Controllers\OpenCourseController::class,'showCourses']);

    });

    //Registration

    Route::group(['prefix' => 'registration','middleware'=>['api','auth.guard:student-api']],function()
    {
        Route::get('/registration',[App\Http\Controllers\RegistrationController::class,'index'])->name('registration');
        Route::post('/counter',[App\Http\Controllers\RegistrationController::class,'counter'])->name('registration.counter');
        Route::post('/create',[App\Http\Controllers\RegistrationController::class,'create'])->name('registration.create');
        Route::get('/show',[App\Http\Controllers\RegistrationController::class,'show'])->name('registration.show');

    });

    //Help

    Route::group(['prefix' => 'help','middleware'=>['api','auth.guard:student-api']],function()
    {
        Route::post('/InformationAboutCourse',[App\Http\Controllers\HelpController::class,'InformationAboutCourse']);
        Route::post('/ChooseDepartment',[App\Http\Controllers\HelpController::class,'ChooseDepartment']);
        Route::post('/ChangeMajor',[App\Http\Controllers\HelpController::class,'ChangeMajor']);

    });

    //POSTS
    Route::group(['prefix' => 'post','middleware'=>['api','auth.guard:student-api']],function()
    {
        Route::get('/index',[App\Http\Controllers\PostController::class,'index']);
        Route::post('/show/{slug}',[App\Http\Controllers\PostController::class,'show']);

    });


    Route::group(['prefix' => 'raghpat','middleware'=>['api','auth.guard:student-api']],function()
    {
        Route::post('/store',[App\Http\Controllers\raghpatEltanskController::class,'store']);
    });


