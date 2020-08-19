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

Route::get('/', 'AppController@index')->name('library');

Route::get('/tracks', 'AppController@tracks')->name('tracks');
Route::get('/tracks/{id}', 'AppController@trackDetail')->name('trackDetail');
Route::post('/tracks/{id}', 'AppController@switchTrack')->name('switchTrack');

Route::get('/community', 'AppController@community')->name('community');

Route::get('/support', function () {
    return view('support');
})->name('support');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view("test", "layouts/app");
