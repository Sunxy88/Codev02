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
    return view('login');
});

Route::post('/login', 'UserController@login');

Route::get('/manage', 'DemandController@manage');

Route::get('/detail/{id}', 'DemandController@detail');

Route::get('/demande', 'UserController@addSession');

Route::post('/newdemande', 'DemandController@create');
