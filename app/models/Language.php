<?php

class Language extends BaseModel {
	public function posts()
    {
        return $this->hasMany('Post');
    }
}
