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
    
    public function showHome()
    {
        if(Auth::check()) {
            $id = Auth::user()->id;
            $user = User::find($id);
            return View::make('TAhome', compact('user'));
        }
        else {
            $posts = Post::all();
            return View::make('TAhome', compact('posts'));
        }
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
    
    public function createComment()
    {
            $id = Auth::user()->id;
            $user = User::find($id);
            if (Input::has('comment')) {
                $comment = new Comment();
                $comment->user_id = $id;
                $comment->post_id = Input::get('post_id');
                $comment->content = Input::get('comment');
                $comment->save();
            }
        return View::make('TAhome', compact('user', 'comment', 'posts'));
    }
    
    
    public function doLogout()
    {
        Auth::logout();
        return Redirect::action('HomeController@showWelcome');
    }

}
