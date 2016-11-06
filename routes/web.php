<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function (){
    Route::group(['middleware' => ['admin']], function (){
        Route::resource('/departments', 'DepartmentController');
        Route::resource('/programs', 'ProgramController');
        Route::resource('/courses', 'CourseController');
        Route::resource('/sections', 'SectionController');
        Route::get('/students', 'StudentController@studentList');
        Route::get('/students/create', 'StudentController@createStudent');
        Route::post('/students', 'StudentController@saveStudent');
        Route::get('/students/{id}', 'StudentController@showStudent');
        Route::get('/students/{id}/edit', 'StudentController@editStudent');
        Route::put('/students/{id}', 'StudentController@saveStudent');
        Route::delete('/students/{id}', 'StudentController@destroyStudent');
    });
    Route::get('/student/courselist', 'StudentController@courseList');
    Route::get('/student/register', 'StudentController@registrationIndex');
});

Route::get('/home', 'HomeController@index');
