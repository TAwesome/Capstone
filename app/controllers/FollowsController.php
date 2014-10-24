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
// Route::get('/follow/{user1}/{user2}', function($user1, $user2)
// {
//     $follower = User::find($user1);
//     $followed = User::find($user2);
//     $follower->follow()->save($followed);
//     return  'YAY';
// });
    
    public function unfollow($id)
    {
        $follower = User::find(Auth::id());
        $followed = User::find($id);
        $follower->follow()->detach($followed->id);
        return;
    }

// Route::get('/unfollow/{user1}/{user2}', function($user1, $user2)
// {
//     $follower = User::find($user1);
//     $followed = User::find($user2);
//     $follower->follow()->detach($followed->id);
//     return  $followed->id;
// }); 
    
    public function following()
    {
        $follower = User::find(Auth::id());
        $data = [];
    
        foreach($follower->follow as $followed) {
            $data[] = array(
                'name' => $followed->first_name . ' ' . $followed->last_name,
                'id'   => $followed->id
            );
        }
        
        return View::make('following')->with('data', $data);
    }

// Route::get('/following/{user1}', function($user1)
// {
//     $follower = User::find($user1);
    
//     $data = [];
    
//     foreach($follower->follow as $followed) {
//         $data[] = $followed->first_name . ' ' . $followed->last_name;
//     }
    
//     return View::make('following')->with('data', $data);
// });

    public function followers()
    {
        $user = User::find(Auth::id());
        $data = [];
    
        foreach($user->followers as $follower) {
            $data[] = array(
                'name' => $follower->first_name . ' ' . $follower->last_name,
                'id'   => $follower->id
            );
        }
        
        return View::make('followers')->with('data', $data);
    }

// Route::get('/followers/{user1}', function($user1)
// {
//     $person = User::find($user1);
    
//     $data = [];
    
//     foreach($person->followers as $followers) {
//         $data[] = $followers->first_name . ' ' . $followers->last_name;
//     }
    
//     return View::make('followers')->with('data', $data);
// });

}

