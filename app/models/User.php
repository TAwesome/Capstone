<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
    
    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
	
	public static $rules = array(
        'email'            => 'required|max:200|email|unique:users', 
        'password'         => 'required|max:255|min:6',
        'first_name'       => 'required|max:255',
        'last_name'        => 'required|max:255',
        'gender'           => 'required|in:M,F',
        'b_year' => 'required',
        'b_month' => 'required',
        'b_date' => 'required'
    );
	
	public function posts()
    {
        return $this->hasMany('Post');
    }
    
    public function comments()
    {
        return $this->hasMany('Comment');
    }
    
    public function likes()
    {
        return $this->belongsToMany('Post', 'likes', 'post_id', 'user_id')->withTimestamps();    
    }
    // changed to followed? Or following? Ugh...
    public function follow()
    {
        return $this->belongsToMany('User', 'followings', 'follower_id', 'followed_id')->withTimestamps();    
    }
    
    public function followers()
    {
        return $this->belongsToMany('User', 'followings', 'followed_id', 'follower_id')->withTimestamps();    
    }
    
    public function languages()
    {
        return $this->belongsToMany('Language');
    }

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
