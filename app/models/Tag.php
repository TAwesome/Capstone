<?php

class Tag extends BaseModel {
    
    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    protected $fillable = ['tag'];
    
	public function posts()
    {
        return $this->belongsToMany('Post');
    }
}
