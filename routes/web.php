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

Route::get('/', 'App\Http\Controllers\JobsController@filterJobs')->middleware('auth');

// All routes related to signup
Route::get('/signup', 'App\Http\Controllers\UserController@signup');
Route::post('/signup', 'App\Http\Controllers\UserController@handleSignup');

// Routes related to authentication and sessions (login and logout)
Route::get('/login', 'App\Http\Controllers\UserController@login')-> name('login');
Route::post('/login', 'App\Http\Controllers\UserController@handleLogin');
Route::get('/logout', 'App\Http\Controllers\UserController@handleLogout');

// Student routes
Route::get('/students', function () {
    return view('students/index');
})->middleware('auth');

// All routes related to student settings
Route::post('/upload', 'App\Http\Controllers\UserController@uploadSettings')->middleware('auth');
Route::get('/dribbble', 'App\Http\Controllers\UserController@getDribbbleShots')->middleware('auth');

// All routes related to companies
Route::get('/companies', 'App\Http\Controllers\CompanyController@index')->middleware('auth');
Route::get('/companies/create', 'App\Http\Controllers\CompanyController@create')->middleware('auth');
Route::post('/companies', 'App\Http\Controllers\CompanyController@store')->middleware('auth');
Route::post('/companies/getCompanyInfo', 'App\Http\Controllers\CompanyController@getCompanyInfo')->middleware('auth');
Route::get('/companies/{company}', 'App\Http\Controllers\CompanyController@show')->middleware('auth');

Route::get('/profile', function () {
    return view('students/profile');
})->middleware('auth');

Route::get('/settingspro', function () {
    return view('settingspro');
})->middleware('auth');

// All routes related to jobs
Route::get('/jobs', 'App\Http\Controllers\JobsController@index')->middleware('auth');
Route::get('/jobs/create', 'App\Http\Controllers\JobsController@create')->middleware('auth');
Route::get('/jobs/{job}', 'App\Http\Controllers\JobsController@show')->middleware('auth');
Route::post('/jobs', 'App\Http\Controllers\JobsController@store')->middleware('auth');

// All routes related to applications
Route::get('/applications', 'App\Http\Controllers\ApplicationsController@index')->middleware('auth');
Route::get('/applications/{application}', 'App\Http\Controllers\ApplicationsController@show')->middleware('auth');
Route::get('/jobs/{job}/create', 'App\Http\Controllers\ApplicationsController@create')->middleware('auth');
Route::post('/applications/{job}', 'App\Http\Controllers\ApplicationsController@store') -> name('applications')->middleware('auth');

Route::post('/label/{application}', 'App\Http\Controllers\LabelsController@put') -> name('labels')->middleware('auth');
