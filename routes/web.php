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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/c', 'HomeController@c');

Route::get('/python', 'HomeController@python');

Route::get('/php', 'HomeController@php');

Route::get('/machine', 'HomeController@machine');

//Route::post('/download', 'HomeController@download');

Route::get('/upload', 'HomeController@upload')->name('upload');

Route::post('/upload', 'HomeController@store')->name('store');

//test