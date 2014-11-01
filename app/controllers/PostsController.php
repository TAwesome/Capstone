<?php

class PostsController extends \BaseController {
    
    public function __construct()
    {
        // call base controller constructor
        parent::__construct();

        // run auth filter before all methods on this controller except index and show
        $this->beforeFilter('auth.basic', array('except' => array('index', 'show', 'TAhome')));
    }
    
    
    /**
     * Display a listing of posts
     *
     * @return Response
     */
    public function index()
    {
        // $posts = Post::whereHas('user', function($q)
        //     {
        //         $userIds = array(Auth::id());
                
        //         foreach(Auth::user()->follow as $following) {
        //             $userIds[] = $following->id;
        //         }
                
        //         $q->whereIn('id', $userIds);
        //     })->get();

        // return View::make('TAhome', compact('posts'));
    }

    /**
     * Show the form for creating a new post
     *
     * @return Response
     */
    public function createComment()
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = Input::get('post_id');
        $comment->content = Input::get('comment');
        $comment->save();
        
        return Redirect::back();
    }

    protected function savePost($post)
    {
        
        $validator = Validator::make($data = Input::all(), Post::$rules);

        if ($validator->fails()) {
            Log::info('No empty posts', Input::all());
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else {
            $post->language_id = Input::get('language');
            $post->content = Input::get('content');
            $post->user_id = Auth::id();
        }
        
        $post->save();
        $id = $post->id;
        return Redirect::action('PostsController@show', $id);
    }
    
    /**
     * Store a newly created post in storage.
     *
     * @return Response
     */
    public function store()
    {
        $post = new Post();
        return $this->savePost($post);
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        
        $user = User::findOrFail($post->user_id);
        
        if (!$post) {
            Log::info('User encountered 404 error', Input::all());
            App::abort(404);
        }
        
        return View::make('users.show', compact('post', 'user'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        
        //compact is the equivalent of ($post => 'post')
        return View::make('posts.edit', compact('post'));
    }

    /**
     * Update the specified post in storage.
     *
     * @param  int  $id
     * @return Response
     */
    
    public function indexHome($id)
    {
        
        $post = Post::find($id);

        return $this->savePost($post);
    }
    
    
    public function update($id)
    {
        
        $post = Post::find($id);

        return $this->savePost($post);
    }
    
    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $id = $user->id;
        $post = Post::find($id);
        if(!$post) {
            App::abort(404);
        }
        $post->delete();
  
        Log::info("$post->$id has been deleted");
        
        return Redirect::action('UsersController@show', $id);
    }
    
    public function postHome()
    {
        $post = new Post();
        $validator = Validator::make($data = Input::all(), Post::$rules);

        if ($validator->fails()) {
            Log::info('No empty posts', Input::all());
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else {
            $post->language_id = Input::get('language');
            $post->content = Input::get('content');
            $post->user_id = Auth::id();
        }
        
        $post->save();
        $id = $post->id;
        return Redirect::action('HomeController@showHome');
    }
    public function like($id)
    {
        $user = Auth::user();
        $user->likes()->attach($id);
        return Redirect::back();
    }
    public function unlike($id)
    {
        $user = Auth::user();
        $user->likes()->detach($id);
        return Redirect::back();
    }

}
