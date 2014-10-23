<?php

class Language extends BaseModel {
    
    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
	
    public static $rules = array(
        'language' => 'required|max:200|unique:languages'
    );
    
    public function setLanguageAttribute($value)
    {
        $this->attributes['language'] = strtolower($value);
    }
    
    public function posts()
    {
        return $this->hasMany('Post');
    }
    public function users()
    {
        return $this->belongsToMany('User');
    }

}
