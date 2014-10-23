<?php

use Carbon\Carbon;

class UsersController extends \BaseController {


    
    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => array('index', 'show', 'store')));
    }
    
    
    /**
     * Display a listing of users
     *
     * @return Response
     */
    public function index()
    {
        //This will need to be only viewable to 
        //the admins

        return View::make('users.index');
    }

    /**
     * Show the form for creating a new user
     *
     * @return Response
     */
    public function create()
    {
        //This may be the same as the landing page
        //depending on how we set things up
        return View::make('users.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @return Response
     */
    public function store()
    {
        
        //Leave this commented out until Jacob finishes working on
        //validation and rules in model
        
        $validator = Validator::make($data = Input::all(), User::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        
        $user = new User();
        
        $response = $this->saveUser($user);
        
        Auth::login($user);
        
        return $response;
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            Log::info('User encountered 404 error', Input::all());
            App::abort(404);
        }

        return View::make('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return View::make('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $user = User::find($id);

        //Leave this commented out until Jacob finishes working on
        //validation and rules in model 

        $validator = Validator::make($data = Input::all(), User::$rules);

        if ($validator->fails())
        {
         return Redirect::back()->withErrors($validator)->withInput();
        }

        return $this->saveUser($data);

    }
    
    public function saveUser(&$user)
    {
        
        $user->email = Input::get('email');
        $user->password = Input::get('password');
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->gender = Input::get('gender');
        //$user->native_language = 'English';
        
        //concatonate the three dropdowns 
        
        $user->date_of_birth = Carbon::create(Input::get('b_year'), Input::get('b_month'), Input::get('b_date'));
        
        $user->date_of_birth->format('Y-m-d');
        
        $user->save();
            
        $id = $user->id;
        
        return Redirect::action('UsersController@show', array($id));
        
    }


    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        
        if(!$user) {
            App::abort(404);
        }
        
        
        Log::info("$user->first_name $user->last_name has been deleted");
        
        Session::flash('successMessage', 'User deleted!');
        
        return Redirect::action('UsersController@index');
        
    }

}
