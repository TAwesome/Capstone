<?php

class FollowsController extends BaseController
{
    //Need to redirect guests if they navigate to the 
    //following or followers page.
    public function follow($id)
    {
        $follower = User::find(Auth::id());
        $followed = User::find($id);
        $follower->follow()->save($followed);
        return;
    }
    
    public function unfollow($id)
    {
        $follower = User::find(Auth::id());
        $followed = User::find($id);
        $follower->follow()->detach($followed->id);
        return Redirect::back();
    }
    
    /**
     * Route: /following
     */
    //change to verb noun combination
    public function following()
    {
        $data = Auth::user()->follow()->paginate(4);
        return View::make('following')->with('data', $data);
    }

    /**
     * Route: /following/me
     */
    public function followers()
    {
        $data = Auth::user()->followers()->paginate(4);
        return View::make('followers')->with('data', $data);
    }

}

