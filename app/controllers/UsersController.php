<?php

use Carbon\Carbon;

class UsersController extends \BaseController {


    
    public function __construct()
    {
        parent::__construct();
        
        
        $this->beforeFilter('auth', array('except' => array('store')));
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
        
        
        //may want to add the ability
        //to search by names
        $query = User::with('languages');
        
        if (Input::has('search')) {
            $search = Input::get('search');
            $query->where('native_language', 'like', "%$search%");
            
            $query->orWhereHas('languages', function($languageSearch){
                $search = Input::get('search');
                $languageSearch->where('language', 'like', "%$search%");
            });
            $meta = [];
            foreach (explode(' ', Input::get('search')) as $value) {
                $meta[] = metaphone($value);
            }
            $query->orWhereIn('first_name_meta', $meta);
            $query->orWhereIn('last_name_meta', $meta);
        }
        
        $users = $query->orderBy('last_name', 'ASC')->paginate(3);

        return View::make('users.index')->with('users', $users);
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
        $user = User::with('posts')->find($id);
        
        
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
        $user->native_language = Input::get('language');
        
        //concatonate the three dropdowns 
        
        $user->date_of_birth = Carbon::create(Input::get('b_year'), Input::get('b_month'), Input::get('b_date'));
        
        $user->date_of_birth->format('Y-m-d');
        
        $user->save();
            
        $id = $user->id;
        
        return Redirect::action('UsersController@show', array($id));
        
    }
    
    public function uploadCover ()
    {
        $user = Auth::user();
        $id = $user->id;
        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $orig_name = str_random(6) . $file->getClientOriginalName();
            $dest_path = public_path() . "/img/cover/$id/";
            $upload = $file->move($dest_path, $orig_name);
            $user->cover = "/img/cover/$id/" . $orig_name;
            $user->save();

            return Redirect::action('UsersController@show', array($id));
        }
    }
    
    
    public function uploadAvatar ()
    {
        $user = Auth::user();
        $id = $user->id;
        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $orig_name = str_random(6) . $file->getClientOriginalName();
            $dest_path = public_path() . "/img/avatar/$id/";
            $upload = $file->move($dest_path, $orig_name);
            $user->avatar = "/img/avatar/$id/" . $orig_name;
            $user->save();

            return Redirect::action('UsersController@show', array($id));
        }
    }
    
    public function uploadPostImage ()
    {
        $user = Auth::user();
        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $orig_name = $file->getClientOriginalName() . str_random(6);
            $dest_path = public_path() . '/img/';
            $upload = $file->move($dest_path, $orig_name);
            $user->post->avatar = '/img/' . $orig_name;
            $user->save();
            $id = $user->id;
            return Redirect::action('UsersController@show', array($id));
        }
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
        $user = Auth::user();
        
        if(!$user) {
            App::abort(404);
        }
        
        
        Log::info("$user->first_name $user->last_name has been deleted");
        
        
        return Redirect::action('HomeController@showWelcome');
        
    }

}
