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

Route::get('/', 'AppController@index')->name('home');

Route::get('/library', 'CourseController@library')->name('library');
Route::post('/courses/start/{id}', 'CourseController@startCourse')->name('startCourse');
Route::post('/courses/complete/{id}', 'CourseController@completeCourse')->name('completeCourse');

Route::get('/tracks', 'TrackController@tracks')->name('tracks');
Route::get('/tracks/{id}', 'TrackController@trackDetail')->name('trackDetail');
Route::post('/tracks/{id}', 'TrackController@switchTrack')->name('switchTrack');

Route::get('/community', 'AppController@community')->name('community');

Route::get('/support', function () {
    return view('support');
})->name('support');

Auth::routes();

Route::view("test", "layouts/app");
