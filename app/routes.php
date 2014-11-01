<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/like/{id}', 'PostsController@like');

Route::get('/unlike/{id}', 'PostsController@unlike');

Route::get('/follow/{id}', 'FollowsController@follow');

Route::get('/unfollow/{id}', 'FollowsController@unfollow');

Route::get('/following/me', 'FollowsController@followers');

Route::get('/following', 'FollowsController@following');

Route::get('/', 'HomeController@showWelcome');

Route::post('/login', 'HomeController@doLogin');

Route::get('/logout', 'HomeController@doLogout');

Route::get('/about', 'HomeController@showAbout');

Route::get('/home', 'HomeController@showHome');

Route::get('/contactUs', 'HomeController@showContact');

Route::get('/rissa', 'HomeController@showRissa');

Route::get('/jill', 'HomeController@showJill');

Route::get('/jacob', 'HomeController@showJacob');

Route::post('/post/comment', 'PostsController@createComment');

Route::resource('posts', 'PostsController');

Route::resource('users', 'UsersController');

Route::get('/profile', 'UsersController@show');

Route::post('/avatar', 'UsersController@uploadAvatar');

Route::post('/cover', 'UsersController@uploadCover');


