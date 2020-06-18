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

Route::get('/', 'UserController@home');

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', 'UserController@register');

Route::post('/login', 'UserController@login');

Route::get('/logout', 'UserController@logout');

Route::get('/manage', 'DemandController@manage');

Route::get('/confirm/{id}', 'DemandController@confirmDelete');

Route::get('/confirmedDelete', 'DemandController@doDelete');

Route::get('/demande', function () {
    return view('demande');
});

Route::post('/newdemande', 'DemandController@create');
