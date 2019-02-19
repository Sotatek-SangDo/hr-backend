<?php
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

Route::group(['middleware' => 'jwt'], function () {
    Route::post('/authenticate', 'AuthController@authenticated');
    Route::group(['prefix' => 'nationalities'], function() {
        Route::get('/', 'NationalityController@getAll');
    });
    Route::group(['prefix' => 'employees'], function() {
        Route::get('/', 'EmployeeController@getAll');
        Route::get('/get-employee', 'EmployeeController@getEmployee');
        Route::get('get-list', 'EmployeeController@getList');
        Route::post('/store', 'EmployeeController@store');
        Route::post('/update', 'EmployeeController@update');
        Route::get('/full-info', 'EmployeeController@getEmpFullInfo');
    });
    Route::group(['prefix' => 'employee-status'], function() {
        Route::get('/', 'EmployeeStatusController@getAll');
        Route::get('get-list', 'EmployeeStatusController@getList');
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
        Route::post('update', 'DepartmentController@update');
        Route::post('destroy', 'DepartmentController@destroy');
        Route::get('get-eDepartment', 'DepartmentController@getEDepartment');
        Route::get('/get-list', 'DepartmentController@getList');
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
    Route::group(['prefix' => 'candidates'], function() {
        Route::get('/', 'CandidateController@getList');
        Route::get('get-candidate-recruitment', 'CandidateController@getAll');
        Route::post('/store', 'CandidateController@store');
        Route::post('/update', 'CandidateController@update');
        Route::post('/destroy', 'CandidateController@destroy');
    });
    Route::group(['prefix' => 'applied-jobs-status'], function() {
        Route::get('/', 'AppiedJobController@getAll');
        Route::post('/store', 'AppiedJobController@store');
        Route::post('/update', 'AppiedJobController@update');
        Route::post('/destroy', 'AppiedJobController@destroy');
    });
    Route::group(['prefix' => 'recruitments'], function() {
        Route::get('/', 'RecruitmentController@getAll');
        Route::get('list', 'RecruitmentController@getList');
        Route::post('/store', 'RecruitmentController@store');
        Route::post('/update', 'RecruitmentController@update');
        Route::post('/destroy', 'RecruitmentController@destroy');
    });
    Route::group(['prefix' => 'interviews'], function() {
        Route::get('/', 'InterviewController@getList');
        Route::get('all', 'InterviewController@getInterviews');
        Route::post('/store', 'InterviewController@store');
        Route::post('/update', 'InterviewController@update');
    });
    Route::group(['prefix' => 'recruitments-plan'], function() {
        Route::get('/', 'RecruitmentPlanController@getAll');
        Route::post('/store', 'RecruitmentPlanController@store');
        Route::post('/update', 'RecruitmentPlanController@update');
        Route::post('/destroy', 'RecruitmentPlanController@destroy');
    });

    Route::group(['prefix' => 'insurances'], function() {
        Route::get('/', 'InsuranceController@getAll');
        Route::post('/store', 'InsuranceController@store');
        Route::post('/update', 'InsuranceController@update');
        Route::post('/destroy', 'InsuranceController@destroy');
    });
    Route::group(['prefix' => 'insurance-payment'], function() {
        Route::get('/', 'InsurancePaymentController@getAll');
        Route::get('get-list', 'InsurancePaymentController@getList');
        Route::post('/store', 'InsurancePaymentController@store');
        Route::post('/update', 'InsurancePaymentController@update');
    });
    Route::group(['prefix' => 'ip-employee'], function() {
        Route::get('/', 'InsuranceEmpPaymentController@getAll');
        Route::post('/store', 'InsuranceEmpPaymentController@store');
        Route::post('/update', 'InsuranceEmpPaymentController@update');
        Route::post('destroy', 'InsuranceEmpPaymentController@destroy');
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
    Route::post('routers/dynamic', 'PermissionController@index');
});
