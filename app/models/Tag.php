<?php

class Tag extends BaseModel {
    
    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    
	public function posts()
    {
        return $this->belongsToMany('Post');
    }
}
