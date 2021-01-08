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

// Homepage
Route::get('/', 'App\Http\Controllers\JobsController@filterJobs');

// Signup
Route::get('/signup', 'App\Http\Controllers\UserController@signup');
Route::post('/signup', 'App\Http\Controllers\UserController@handleSignup');

// Authentication and sessions (login/logout)
Route::get('/login', 'App\Http\Controllers\UserController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\UserController@handleLogin');
Route::get('/logout', 'App\Http\Controllers\UserController@handleLogout');

// Users
// Middleware('auth') forces non-logged in users back to the login
Route::get('/users', 'App\Http\Controllers\UserController@index')->middleware('auth');
Route::get('/profile', 'App\Http\Controllers\UserController@profile')->middleware('auth');
Route::post('/updateinfo', 'App\Http\Controllers\UserController@updateInfo')->middleware('auth');
Route::post('/upload', 'App\Http\Controllers\UserController@uploadSettings')->middleware('auth');
Route::get('/dribbble', 'App\Http\Controllers\UserController@getDribbbleShots')->middleware('auth');
Route::get('/users/{user}', 'App\Http\Controllers\UserController@show')->middleware('auth');

// Companies
Route::get('/companies', 'App\Http\Controllers\CompanyController@index');
Route::get('/companyprofile', 'App\Http\Controllers\CompanyController@showProfile')->middleware('auth');
Route::get('/companies/create', 'App\Http\Controllers\CompanyController@create')->middleware('auth');
Route::post('/companyprofile', 'App\Http\Controllers\CompanyController@updateProfile')->middleware('auth');
Route::post('/companies', 'App\Http\Controllers\CompanyController@store')->middleware('auth');
Route::post('/companies/getCompanyInfo', 'App\Http\Controllers\CompanyController@getCompanyInfo');
Route::get('/companies/{company}', 'App\Http\Controllers\CompanyController@show');

// Jobs
Route::get('/jobs', 'App\Http\Controllers\JobsController@index');
Route::get('/jobs/create', 'App\Http\Controllers\JobsController@create')->middleware('auth');
Route::get('/jobs/{job}', 'App\Http\Controllers\JobsController@show');
Route::post('/jobs', 'App\Http\Controllers\JobsController@store')->middleware('auth');

// Applications
Route::get('/applications', 'App\Http\Controllers\ApplicationsController@index')->middleware('auth');
Route::get('/applications/{application}', 'App\Http\Controllers\ApplicationsController@show');
Route::get('/jobs/{job}/create', 'App\Http\Controllers\ApplicationsController@create')->middleware('auth');
Route::post('/applications/{job}', 'App\Http\Controllers\ApplicationsController@store') -> name('applications')->middleware('auth');
Route::post('/label/{application}', 'App\Http\Controllers\LabelsController@put') -> name('labels')->middleware('auth');
