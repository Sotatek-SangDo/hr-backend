<?php

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
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test', function() {
    //return Carbon::createFromFormat('Y-m-d H:i', '1975-05-21 22:10')->toDateTimeString();
    //return Carbon::parse('05-01-2019 09:01')->format('');
    return Carbon::createFromFormat('Y-m-d H:i', '2019-02-19 11:30')->toDateTimeString();
});
