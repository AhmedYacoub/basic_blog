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

Route::group(['middleware' => 'auth'], function() {
	// Dashboard
	Route::get('/home', 'HomeController@index')->name('home');

	// Posts routes
	Route::resource('posts', 'PostsController');

	// Comments routes
	Route::group(['prefix' => '/comments', 'as' => 'comments.'], function() {
		Route::post('/{post}', 'CommentsController@store')->name('store');
	});

	// Replies routes
	Route::group(['prefix' => '/replies', 'as' => 'replies.'], function() {
		Route::post('/{comment}', 'RepliesController@store')->name('store');
	});
});
