<?php

class Comment extends BaseModel {
    
    public static $rules = array(
        'content' => 'required|max:100',
        'user_id' => 'required',
        'post_id' => 'required'
    );
    
    public function users()
    {
        return $this->belongsTo('User');
    }
    public function posts()
    {
        return $this->belongsTo('Post');
    }
}
