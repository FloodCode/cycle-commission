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

    // Pages
    Route::get('/commission', 'HomeController@commission')->name('commission');
    Route::get('/blank', 'HomeController@blank')->name('blank');

    // Locale
    Route::get('/locale/{code}', 'HomeController@locale');

    // News
    Route::get('/news', 'NewsController@index');
    Route::get('/news/add', 'NewsController@add');
    Route::get('/news/view/{id}', 'NewsController@view');
    Route::get('/news/edit/{id}', 'NewsController@edit');

    Route::post('/news/add', 'NewsController@add');
    Route::post('/news/edit/{id}', 'NewsController@edit');
    Route::post('/news/delete', 'NewsController@delete');
});

Auth::routes();
