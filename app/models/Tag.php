<?php

class Tag extends BaseModel {
	public function posts()
    {
        return $this->belongsToMany('Post');
    }
}
