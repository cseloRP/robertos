<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//
//Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
//        ->where('slug', '[\w\d\-\_]+');
//
//Route::get('blog', 'BlogController@getList');
//
//Route::get('gallery/{id}', ['as' => 'galleries.single', 'uses' => 'GalleryController@getSingle'])
//    ->where('id', '[\d]+');
//
//Route::get('galleries/list', 'GalleryController@getList');
//
//Route::resource('categories', 'CategoryController', ['except' => ['create']]);
//
//Route::resource('tags', 'TagController', ['except' => ['create']]);

Route::get('/', 'pagesController@getIndex');
Route::get('about', 'pagesController@getAbout');
//Route::get('contact', 'pagesController@getContact');
//Route::post('contact', 'pagesController@postContact');
//
//Route::resource('post', 'PostController');
//
//Route::resource('album', 'AlbumController');
//
//Route::resource('image', 'ImageController', ['except' => ['create']]);
//
//Route::group(['prefix' => 'admin'], function () {
//    Route::get('/', 'AdminController@index')->name('admin.dashboard');
//    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
//    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
//});


Auth::routes();

