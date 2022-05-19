<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//----------------------welcome------------
Route::get('/', function () {
    return view('welcome');
});

//-----------------------admin---------------------------------------------


//---------------------auth-------------------------------------------------

Route::get('/login', [App\Http\Controllers\authController::class,'index'])->name('login');
Route::post('/postlogin', [App\Http\Controllers\authController::class, 'postlogin'])->name('postlogin');
Route::get('/logout',[App\Http\Controllers\authController::class, 'logout'])->name('logout');

//----------------------courses---------------------------------------------
Route::resource('/course', 'App\Http\Controllers\CourseController');

//--------------------user--------------------------------------------------
Route::resource('/user', 'App\Http\Controllers\UserController');
Route::post('/createProfile', [App\Http\Controllers\authController::class, 'createProfile'])->name('createProfile');


//----------------------------Open _ Course---------------------------------------
Route::resource('/open_course', 'App\Http\Controllers\OpenCourseController');
Route::get('/count',[App\Http\Controllers\openCourseController::class,'count'])->name('count');

//----------------------------admin add courses to register---------------------
 Route::get('/courseregister',[App\Http\Controllers\CourseregisterController::class,'index'])->name('courseregister');
 Route::get('/courseregister/trashed',[App\Http\Controllers\CourseregisterController::class,'trashed'])->name('courseregister.trashed');
 Route::post('/courseregister/create{id}',[App\Http\Controllers\CourseregisterController::class,'create'])->name('courseregister.create');
 Route::post('/courseregister/store',[App\Http\Controllers\CourseregisterController::class,'store'])->name('courseregister.store');
 Route::get('/courseregister/show',[App\Http\Controllers\CourseregisterController::class,'show'])->name('courseregister.show');
 Route::post('/courseregister/edit{id}',[App\Http\Controllers\CourseregisterController::class,'edit'])->name('courseregister.edit');
 Route::post('/courseregister/update{id}',[App\Http\Controllers\CourseregisterController::class,'update'])->name('courseregister.update');
 Route::post('/courseregister/destroy/{id}',[App\Http\Controllers\CourseregisterController::class,'destroy'])->name('courseregister.destroy');
 Route::get('/courseregister/hdelete{id}',[App\Http\Controllers\CourseregisterController::class,'hdelete'])->name('courseregister.hdelete');
 Route::post('/courseregister/restore/{id}',[App\Http\Controllers\CourseregisterController::class,'restore'])->name('courseregister.restore');

 //-----------------------Registration-courses---------------------------------------

//Route::get('/registration',[App\Http\Controllers\RegistrationController::class,'index'])->name('registration');
 Route::get('/registration/trashed',[App\Http\Controllers\RegistrationController::class,'trashed'])->name('registration.trashed');
 //Route::post('/registration/create{id}',[App\Http\Controllers\RegistrationController::class,'create'])->name('registration.create');
 Route::post('/registration/store',[App\Http\Controllers\RegistrationController::class,'store'])->name('registration.store');
 //Route::get('/registration/show',[App\Http\Controllers\RegistrationController::class,'show'])->name('registration.show');
 Route::get('/registration/edit',[App\Http\Controllers\RegistrationController::class,'edit'])->name('registration.edit');
 Route::post('/registration/update',[App\Http\Controllers\RegistrationController::class,'update'])->name('registration.update');
 Route::post('/registration/destroy/{id}',[App\Http\Controllers\RegistrationController::class,'destroy'])->name('registration.destroy');
 Route::get('/registration/hdelete{id}',[App\Http\Controllers\RegistrationController::class,'hdelete'])->name('registration.hdelete');
 Route::post('/registration/restore/{id}',[App\Http\Controllers\RegistrationController::class,'restore'])->name('registration.restore');
 Route::get('/registration/counter',[App\Http\Controllers\RegistrationController::class,'counter'])->name('registration.counter');
 //----------------------------search----------------------------------------------------------------
 Route::get('/registration/search',[App\Http\Controllers\RegistrationController::class,'search'])->name('registration.search');
 Route::post('/registration/findcourse',[App\Http\Controllers\RegistrationController::class,'findcourse'])->name('registration.findcourse');
 Route::post('/registration/findstudent',[App\Http\Controllers\RegistrationController::class,'findstudent'])->name('registration.findstudent');
//---------------------AddGrade------------------------------------------------------------------------
Route::get('/addgrade/index',[App\Http\Controllers\addgradeController::class,'index'])->name('addgrade.index');
Route::post('/addgrade/create',[App\Http\Controllers\addgradeController::class,'create'])->name('addgrade.create');
Route::post('/addgrade/store{id}',[App\Http\Controllers\addgradeController::class,'store'])->name('addgrade.store');
Route::post('/registration/delete{id}',[App\Http\Controllers\addgradeController::class,'delete'])->name('registration.delete');

//----------------------------post-----------------------------------------------------------------------

Route::group(['prefix' => 'post'],function()
    {
        Route::get('/showposts',[App\Http\Controllers\PostController::class,'showposts'])->name('showPosts');
        Route::get('/showpost/{id}',[App\Http\Controllers\PostController::class,'showpost'])->name('showPost');
        Route::post('/store',[App\Http\Controllers\PostController::class,'store'])->name('storePost');
        Route::get('/edit/{id}',[App\Http\Controllers\PostController::class,'edit'])->name('editPost');
        Route::post('/update/{id}',[App\Http\Controllers\PostController::class,'update'])->name('updatePost');
        Route::get('/destroy/{id}',[App\Http\Controllers\PostController::class,'destroy'])->name('destroyPost');
        Route::get('/hdelete/{id}',[App\Http\Controllers\PostController::class,'hdelete'])->name('hdeletePost');
        Route::get('/restore/{id}',[App\Http\Controllers\PostController::class,'restore'])->name('restorePost');
        Route::get('/onlyTrashed',[App\Http\Controllers\PostController::class,'onlyTrashed'])->name('onlyTrashedPost');

    });
//--------------------------------------------الصفجة الرئيسية---------------------------------------------------------

    Route::get('/mainPage',[App\Http\Controllers\PostController::class,'mainPage'])->name('mainPage');


//----------------------------------------------رغبات التنسيق--------------------------------------------------------

Route::group(['prefix' => 'raghpat'],function()
    {
        Route::get('/depCounter',[App\Http\Controllers\raghpatEltanskController::class,'depCounter'])->name('depCounter');
        Route::get('/admin',[App\Http\Controllers\raghpatEltanskController::class,'admin'])->name('admin');
        Route::post('/storeCounter/{item}',[App\Http\Controllers\raghpatEltanskController::class,'storeCounter'])->name('storeCounter');
    });
