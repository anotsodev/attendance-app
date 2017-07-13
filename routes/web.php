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

Route::get('/attendance', function () {
    return view('attendance');
})->name('attendance');

Route::get('/events', function () {
    return view('events');
})->name('events');

Route::get('/about', function () {
    return view('about');
})->name('about');
