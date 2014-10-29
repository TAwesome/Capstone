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

Route::get('ormTest', function() {
    $posts = Post::whereHas('user', function($q)
    {
        $userIds = array(Auth::id());
        
        foreach(Auth::user()->follow as $following) {
            $userIds[] = $following->id;
        }
        
        $q->whereIn('id', $userIds);
    })->get();
    
    foreach($posts as $post) {
        var_dump($post);
    }
});
