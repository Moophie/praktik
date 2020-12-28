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

// All routes related to login and signup
Route::get('/login', 'App\Http\Controllers\UserController@login');
Route::post('/login', 'App\Http\Controllers\UserController@handleLogin');
Route::get('/signup', 'App\Http\Controllers\UserController@signup');
Route::post('/signup', 'App\Http\Controllers\UserController@handleSignup');

Route::get('/student', function () {
    return view('student');
});

// All routes related to student settings
Route::post('/upload', 'App\Http\Controllers\UserController@uploadSettings');
Route::get('/dribbble', 'App\Http\Controllers\UserController@getDribbbleShots');

// All routes related to companies
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

// All routes related to jobs
Route::get('/jobs', 'App\Http\Controllers\JobsController@index');
Route::get('/jobs/create', 'App\Http\Controllers\JobsController@create');
Route::get('/jobs/{job}', 'App\Http\Controllers\JobsController@show');
Route::post('/jobs', 'App\Http\Controllers\JobsController@store');

// All routes related to applications
Route::get('/applications', 'App\Http\Controllers\ApplicationsController@index');
Route::get('/applications/{application}', 'App\Http\Controllers\ApplicationsController@show');
Route::get('/jobs/{job}/create', 'App\Http\Controllers\ApplicationsController@create');
Route::post('/applications/{job}', 'App\Http\Controllers\ApplicationsController@store') -> name('applications');