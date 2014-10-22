<?php

class Post extends BaseModel {
    
	public static $rules = array(
        'content' => 'required|max:200'
    );
    
    public function users()
    {
        return $this->belongsTo('User');
    }
    
    public function likes()
    {
        return $this->belongsToMany('User', 'likes', 'user_id', 'post_id')->withTimestamps();    
    }
    
    public function languages()
    {
        return $this->belongsTo('Language');
    }
    
    public function comments()
    {
        return $this->hasMany('Comment');
    }
    // Add your validation rules here

	// Don't forget to fill this array

}
