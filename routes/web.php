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

Route::get('/companies', 'App\Http\Controllers\CompanyController@index');
Route::get('/companies/create', 'App\Http\Controllers\CompanyController@create');
Route::get('/companies/{company}', 'App\Http\Controllers\CompanyController@show');
Route::post('/companies', 'App\Http\Controllers\CompanyController@store');

Route::get('/settings', function(){
    return view('settings');
});

Route::get('/settingspro', function(){
    return view('settingspro');
});

Route::get('/vacancy', function(){
    return view('vacancy');
});