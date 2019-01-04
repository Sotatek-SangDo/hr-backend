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
        Route::get('get-emp-skill', 'SkillUserController@getEmpSkill');
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
        Route::get('get-eDepartment', 'DepartmentController@getEDepartment');
    });
    Route::group(['prefix' => 'educations'], function() {
        Route::get('/', 'EducationController@getAll');
        Route::get('get-eEducation', 'EducationController@getEmployeeEducation');
        Route::post('/store', 'EducationController@store');
        Route::post('/update', 'EducationController@update');
        Route::post('/destroy', 'EducationController@destroy');
    });
    Route::group(['prefix' => 'certifications-user'], function() {
        Route::get('/', 'CertificationUserController@getAll');
        Route::get('get-eCertification', 'CertificationUserController@getECertification');
        Route::post('/store', 'CertificationUserController@store');
        Route::post('/update', 'CertificationUserController@update');
        Route::post('/destroy', 'CertificationUserController@destroy');
    });
    Route::group(['prefix' => 'dependents'], function() {
        Route::get('/', 'DependentController@getAll');
        Route::get('get-eDependents', 'DependentController@getEDependents');
        Route::post('/store', 'DependentController@store');
        Route::post('/update', 'DependentController@update');
        Route::post('/destroy', 'DependentController@destroy');
    });
    Route::group(['prefix' => 'emergency-contacts'], function() {
        Route::get('/', 'EmergencyContactController@getAll');
        Route::get('get-eEmergency-contact', 'EmergencyContactController@getEEmergencyContact');
        Route::post('/store', 'EmergencyContactController@store');
        Route::post('/update', 'EmergencyContactController@update');
        Route::post('/destroy', 'EmergencyContactController@destroy');
    });
    Route::group(['prefix' => 'user-languages'], function() {
        Route::get('/', 'UserLanguageController@getAll');
        Route::get('get-eLanguage', 'UserLanguageController@getELanguage');
        Route::post('/store', 'UserLanguageController@store');
        Route::post('/update', 'UserLanguageController@update');
        Route::post('/destroy', 'UserLanguageController@destroy');
    });
    Route::group(['prefix' => 'insurances'], function() {
        Route::get('/', 'InsuranceController@getAll');
        Route::post('/store', 'InsuranceController@store');
        Route::post('/update', 'InsuranceController@update');
        Route::post('/destroy', 'InsuranceController@destroy');
    });
    Route::group(['prefix' => 'insurance-payment'], function() {
        Route::get('/', 'InsurancePaymentController@getAll');
        Route::post('/store', 'InsurancePaymentController@store');
        Route::post('/update', 'InsurancePaymentController@update');
    });
    Route::group(['prefix' => 'ip-employee'], function() {
        Route::get('/', 'InsuranceEmpPaymentController@getAll');
        Route::post('/store', 'InsuranceEmpPaymentController@store');
        Route::post('/update', 'InsuranceEmpPaymentController@update');
    });
    Route::group(['prefix' => 'languages'], function() {
        Route::get('/', 'LanguageController@getAll');
    });
    Route::group(['prefix' => 'qualifications'], function() {
        Route::get('/', 'QualificationController@getAll');
    });
    Route::group(['prefix' => 'certifications'], function() {
        Route::get('/', 'CertificationController@getAll');
    });
});
