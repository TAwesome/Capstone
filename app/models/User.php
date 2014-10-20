<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	
	public static $rules = array(
        'email'            => 'required|max:200|email|unique', 
        'password'         => 'required|max:255|min:6',
        'first_name'       => 'required|max:255',
        'last_name'        => 'required|max:255',
        'gender'           => 'required|in:M,F',
        'date_of_birth'    => 'required|date',
        'native_language'  => 'required|in:English,Spanish,French'
    );
	
	public function posts()
    {
        return $this->hasMany('Post');
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
