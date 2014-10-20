<?php

class Post extends BaseModel {
    
    public function users()
    {
        return $this->belongsTo('User');
    }
    
    public function languages()
    {
        return $this->belongsTo('Language');
    }
	// Add your validation rules here
	public static $rules = array(
        'content' => 'required|max:200'
    );

	// Don't forget to fill this array

}
