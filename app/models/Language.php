<?php

class Language extends BaseModel {
	public function posts()
    {
        return $this->hasMany('Post');
    }
    public function users()
    {
        return $this->belongsToMany('User');
    }

}
