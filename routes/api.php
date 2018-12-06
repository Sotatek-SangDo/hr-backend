<?php

header('Access-Control-Allow-Headers:Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With,Access-Control-Allow-Origin, X-CSRF-TOKEN');
header('Access-Control-Allow-Origin: *');
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', 'AuthController@login');

Route::group(['middleware' => 'hr.api'], function () {
    Route::get('test', function() { return 1; });
    Route::group(['prefix' => 'nationalities'], function() {
        Route::get('/', 'NationalityController@getAll');
    });
    Route::group(['prefix' => 'employees'], function() {
        Route::get('/', 'EmployeeController@getAll');
        Route::post('/store', 'EmployeeController@store');
        Route::post('/update', 'EmployeeController@update');
        Route::get('/full-info', 'EmployeeController@getEmpFullInfo');
    });
    Route::group(['prefix' => 'employee-status'], function() {
        Route::get('/', 'EmployeeStatusController@getAll');
    });
    Route::group(['prefix' => 'jobs'], function() {
        Route::get('/', 'JobController@getAll');
    });
    Route::group(['prefix' => 'pay-grade'], function() {
        Route::get('/', 'PayGradeController@getAll');
    });
    Route::group(['prefix' => 'skills'], function() {
        Route::get('/', 'SkillController@getAll');
    });
    Route::group(['prefix' => 'skill-user'], function() {
        Route::get('/', 'SkillUserController@getAll');
        Route::post('/store', 'SkillUserController@store');
        Route::post('/update', 'SkillUserController@update');
        Route::post('/destroy', 'SkillUserController@destroy');
    });
    Route::group(['prefix' => 'company'], function() {
        Route::get('/', 'CompanyController@getAll');
    });
    Route::group(['prefix' => 'departments'], function() {
        Route::get('/', 'DepartmentController@getAll');
        Route::post('/store', 'DepartmentController@store');
    });
    Route::group(['prefix' => 'educations'], function() {
        Route::get('/', 'EducationController@getAll');
        Route::post('/store', 'EducationController@store');
    });
    Route::group(['prefix' => 'qualifications'], function() {
        Route::get('/', 'QualificationController@getAll');
    });
});
