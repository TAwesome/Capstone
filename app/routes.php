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

Route::get('/following', 'FollowsController@following');

Route::get('/followers', 'FollowsController@followers');

Route::get('/', 'HomeController@showWelcome');

Route::post('/login', 'HomeController@doLogin');

Route::get('/logout', 'HomeController@doLogout');

// Route::get('/about', 'HomeController@showAbout');

Route::get('/Rissa', 'HomeController@showRissa');

Route::get('/Jill', 'HomeController@showJill');

Route::get('/Jacob', 'HomeController@showJacob');

Route::get('/Rissa', 'HomeController@showRissa');

Route::resource('posts', 'PostsController');

Route::resource('users', 'UsersController');
