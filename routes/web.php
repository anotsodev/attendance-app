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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/events', 'SystemController@getEvents')->name('events');

Route::get('/studentattendance','SystemController@getStudentAttendance')->name('studentattendance');

Route::get('/classcodes','SystemController@getClassCodes')->name('classcodes'); 

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/studentattendancesheet', function() {
	return view('studentattendancesheet');
})->name('studentattendancesheet');

Route::get('/visitorattendancesheet', function() {
	return view('visitorattendancesheet');
})->name('visitorattendancesheet');
