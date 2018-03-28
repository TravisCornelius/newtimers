<?php

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
    return view('locations');
});

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/timers', 'HomeController@timers');
Route::get('/start_timer', 'HomeController@start_timer');
Route::get('/clear_timer', 'HomeController@clear_timer');
Route::get('/add5_timer', 'HomeController@add5_timer');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
