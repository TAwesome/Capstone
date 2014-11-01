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

    public function __construct()
    {
        parent::__construct();
        
        $this->beforeFilter('auth', array('only' => array('showHome', 'createComment', 'doLogout')));
    }

    public function showWelcome()
    {
        return View::make('landingpage');
    }
    
    public function showHome()
    {
        $posts = array();
        $query = Post::with('user');
        
        $query->whereHas('user', function($q)
        {
            $userIds = array(Auth::id());
            
            foreach(Auth::user()->follow as $following) {
                $userIds[] = $following->id;
            }
            
            $q->whereIn('id', $userIds);
        });
        
        if (Input::has('tag')) {
            $query->whereHas('tags', function($q)
            {
                $q->where('tag', '=', Input::get('tag'));
            });
        }
        
        if (Input::has('language')) {
            $query->whereHas('language', function($q)
            {
                $q->where('language', '=', Input::get('language'));
            });
        }
        
        $posts = $query->paginate(5);
        return View::make('TAhome', compact('posts'));
    }
    
    public function showContact()
    {
        return View::make('TAcontactus');
    }
    
     public function showJill()
    {
        return View::make('TAbout_jill');
    }
    
     public function showJacob()
    {
        return View::make('TAbout_jacob');
    }
    
     public function showRissa()
    {
        return View::make('TAbout_rissa');
    }
    
    
    public function showAbout()
    {
        return View::make('TAbout');
    }
    
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
