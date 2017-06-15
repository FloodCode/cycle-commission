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

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/commission', 'HomeController@commission')->name('commission');

    Route::get('/locale/{code}', 'HomeController@locale');
});

Auth::routes();
