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
    Route::get('/training_materials', 'HomeController@trainingMaterials');

    // Admin panel
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/admin/', 'AdminController@index')->name('admin');
    });

    // Pages
    Route::get('/blank', 'HomeController@blank')->name('blank');

    // Locale
    Route::get('/locale/{code}', 'HomeController@locale');

    // News
    Route::get('/news', 'NewsController@index');
    Route::get('/news/view/{id}', 'NewsController@view');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/news/add', 'NewsController@add');
        Route::get('/news/edit/{id}', 'NewsController@edit');

        Route::post('/news/add', 'NewsController@add');
        Route::post('/news/edit/{id}', 'NewsController@edit');
        Route::post('/news/delete', 'NewsController@delete');
    });

    // Pages
    Route::get('/pages/list', 'PagesController@listPages');
    Route::get('/pages/view/{pageName}', 'PagesController@view');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/pages/add', 'PagesController@add');
        Route::get('/pages/edit/{pageName}', 'PagesController@edit');

        Route::post('/pages/add/', 'PagesController@add');
        Route::post('/pages/edit/{pageName}', 'PagesController@edit');
        Route::post('/pages/delete/', 'PagesController@delete');
    });

    // Announcements
    Route::get('/announcements', 'AnnouncementsController@index');
    Route::get('/announcements/view/{id}', 'AnnouncementsController@view');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/announcements/add', 'AnnouncementsController@add');
        Route::get('/announcements/edit/{id}', 'AnnouncementsController@edit');

        Route::post('/announcements/add', 'AnnouncementsController@add');
        Route::post('/announcements/edit/{id}', 'AnnouncementsController@edit');
        Route::post('/announcements/delete', 'AnnouncementsController@delete');
    });
});

Auth::routes();
