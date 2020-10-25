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

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function(){
    return view('signup');
});

Route::get('/student', function(){
    return view('student');
});

Route::get('/company', function(){
    return view('company');
});

Route::get('/settings', function(){
    return view('settings');
});

Route::get('/settingspro', function(){
    return view('settingspro');
});

// vacatures
Route::get('/jobs', 'App\Http\Controllers\JobsController@index');
Route::get('/jobs/{ job }', 'App\Http\Controllers\JobsController@show');
Route::get('/jobs/create', 'App\Http\Controllers\JobsController@create');
Route::post('/jobs','App\Http\Controllers\JobsController@store');

Route::get('/applications', 'App\Http\Controllers\ApplicationsController@index');
