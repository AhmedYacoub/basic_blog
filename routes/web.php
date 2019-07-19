<?php

// landing page
Route::get('/', function () {
    return view('welcome');
});

// authentication routes - php artisan make:auth generates it
Auth::routes();

// group the following routes by auth middleware - you have to be signed-in to proceeed
Route::group(['middleware' => 'auth'], function() {
	// Dashboard
	Route::get('/home', 'HomeController@index')->name('home');

	// Posts resourcfull controllers routes
	Route::resource('posts', 'PostsController');

	// Comments routes
	Route::group(['prefix' => '/comments', 'as' => 'comments.'], function() {
        // store comment route
		Route::post('/{post}', 'CommentsController@store')->name('store');
	});

	// Replies routes
	Route::group(['prefix' => '/replies', 'as' => 'replies.'], function() {
        // store reply route
		Route::post('/{comment}', 'RepliesController@store')->name('store');
	});
});
