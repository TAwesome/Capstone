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

Route::get('/Like/{id}', 'PostController@like');

Route::get('/Unlike/{id}', 'PostController@unlike');

Route::get('/Follow/{id}', 'FollowsController@follow');

Route::get('/Unfollow/{id}', 'FollowsController@unfollow');

Route::get('/Following/me', 'FollowsController@followers');

Route::get('/Following', 'FollowsController@following');

Route::get('/', 'HomeController@showWelcome');

Route::post('/Login', 'HomeController@doLogin');

Route::get('/Logout', 'HomeController@doLogout');

Route::get('/About', 'HomeController@showAbout');

Route::get('/Home', 'HomeController@showHome');

Route::get('/ContactUs', 'HomeController@showContact');

Route::get('/Rissa', 'HomeController@showRissa');

Route::get('/Jill', 'HomeController@showJill');

Route::get('/Jacob', 'HomeController@showJacob');

Route::resource('posts', 'PostsController');

Route::resource('users', 'UsersController');
