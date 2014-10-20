<?php

class Post extends BaseModel {
    
    public static $rules = array(
        'content' => 'required|max:200'
    );
    
     public function users()
    {
        return $this->belongsTo('User');
    }
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array

}
