<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

Route::get('/dribbble', 'App\Http\Controllers\UserController@getDribbbleShots');

Route::get('/company', function () {
    return view('company');
});
Route::get('/companies', 'App\Http\Controllers\CompanyController@index');
Route::get('/companies/create', 'App\Http\Controllers\CompanyController@create');
Route::post('/companies', 'App\Http\Controllers\CompanyController@store');
Route::post('/companies/getCompanyInfo', 'App\Http\Controllers\CompanyController@getCompanyInfo');
Route::get('/companies/{company}', 'App\Http\Controllers\CompanyController@show');

Route::get('/settings', function () {
    return view('settings');
});

Route::get('/settingspro', function () {
    return view('settingspro');
});

Route::get('/jobs', 'App\Http\Controllers\JobsController@index');
Route::get('/jobs/{job}', 'App\Http\Controllers\JobsController@show');
Route::get('/jobs/create', 'App\Http\Controllers\JobsController@create');
Route::post('/jobs','App\Http\Controllers\JobsController@store');

Route::get('/applications', 'App\Http\Controllers\ApplicationsController@index');
Route::get('/applications/create', 'App\Http\Controllers\ApplicationsController@create');
Route::post('/applications','App\Http\Controllers\ApplicationsController@store');
