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

Route::get('/', 'AppController@index');

Route::get('/tracks', 'AppController@tracks');

Route::get('/community', 'AppController@community');

Route::get('/support', function () {
    return view('support');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
