<?php

class HomeController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function showWelcome()
    {
        return View::make('landingpage');
    }
    
    public function showContact()
    {
        return View::make('TAcontactus');
    }
    
    
    // public function showAbout()
    // {
    //     return View::make('');
    // }
    
    
    public function doLogin()
    {
        //Attempt to login the user
        //If login succeeds, redirect intended
        //if login fails, redirect back to login form
        
        $credentials = [
            'email' => Input::get('email'),
            'password' => Input::get('password')
        ];
        
        $valid = Auth::attempt($credentials);
        
        if ($valid) {
            $id = Auth::user()->id;
            return Redirect::action('UsersController@show', array($id));
        }
        
        else {
            return Redirect::back()->withInput();
        }
    }
    
    
    public function doLogout()
    {
        Auth::logout();
        return Redirect::action('HomeController@showWelcome');
    }

}
