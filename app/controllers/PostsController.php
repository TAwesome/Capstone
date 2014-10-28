<?php

class PostsController extends \BaseController {
    
    public function __construct()
    {
        // call base controller constructor
        parent::__construct();

        // run auth filter before all methods on this controller except index and show
        $this->beforeFilter('auth.basic', array('except' => array('index', 'show')));
    }
    
    
    /**
     * Display a listing of posts
     *
     * @return Response
     */
    public function index()
    {
        //This can be uncommented once we get a combined 
        //firstname lastname user 
        //May need to do lazy loading
        
        // $search = Input::get('search');

        // $query = Post::with('user');
        
        // $query->where('tag', 'like', "%$search%");
        
        // $query->orWhere('content', 'like', "%$search%");

        // $posts = $query->orderBy('id', 'DESC')->paginate(5);
        
        $post = Post::with('id');
        $posts = $post->orderBy('id', 'DESC')->paginate(5);

        return View::make('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post
     *
     * @return Response
     */
    public function create()
    {
        $validator = Validator::make($data = Input::all(), Post::$rules);

        if ($validator->fails()) {
            Log::info('No empty posts', Input::all());
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else {
            if (Input::hasFile('comment')) {
                $comment = new Comment();
                $comment->content = Input::get('comment');
                $comment->save();
            }
        }
        return View::make('users.show');
    }

    protected function savePost($post)
    {
        
        $validator = Validator::make($data = Input::all(), Post::$rules);

        if ($validator->fails()) {
            Log::info('No empty posts', Input::all());
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else {
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
        $post = Post::find($id);
        if(!$post) {
            App::abort(404);
        }
        $post->delete();
  
        Log::info("$post->title has been deleted");
        
        Session::flash('successMessage', 'Post deleted!');
        
        return Redirect::action('PostsController@index');
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
