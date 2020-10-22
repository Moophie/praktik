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

Route::get('/login', 'App\Http\Controllers\UserController@login');
Route::post('/login', 'App\Http\Controllers\UserController@handleLogin');

Route::get('/signup', 'App\Http\Controllers\UserController@signup');
Route::post('/signup', 'App\Http\Controllers\UserController@handleSignup');

Route::get('/student', function () {
    return view('student');
});

Route::post('/upload', 'App\Http\Controllers\UserController@uploadSettings');

Route::get('/company', function () {
    return view('company');
});

Route::get('/settings', function () {
    return view('settings');
});

Route::get('/settingspro', function () {
    return view('settingspro');
});

Route::get('/vacancy', function () {
    return view('vacancy');
});
