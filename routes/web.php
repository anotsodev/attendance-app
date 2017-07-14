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

Route::get('/visitorattendance','SystemController@getVisitorAttendance')->name('visitorattendance');
 

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/studentattendancesheet','SystemController@studentAttendanceSheet')->name('studentattendancesheet');

Route::get('/visitorattendancesheet', function() {
	return view('visitorattendancesheet');
})->name('visitorattendancesheet');

Route::post('/insertstudentattendance','SystemController@insertStudentAttendance');

Route::post('/insertvisitorattendance','SystemController@insertVisitorAttendance');

Route::get('/addevent', function(){
	return view('addevent');
})->name('addevent');

Route::get('/addclasscode', function(){
	return view('addclasscode');
})->name('addclasscode');

Route::post('/insertevent','SystemController@insertEvent');
Route::post('/insertclasscode','SystemController@insertClassCode');