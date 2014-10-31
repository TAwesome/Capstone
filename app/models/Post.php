<?php

class Post extends BaseModel {
    
    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    
	public static $rules = array(
        'content' => 'required|max:200'
    );
    
    public function tags()
    {
        return $this->belongsToMany('Tag');
    }
    
    public function user()
    {
        return $this->belongsTo('User');
    }
    
    public function likes()
    {
        return $this->belongsToMany('User', 'likes', 'post_id', 'user_id')->withTimestamps();    
    }
    
    public function languages()
    {
        return $this->belongsTo('Language');
    }
    
    public function comments()
    {
        return $this->hasMany('Comment');
    }
    
    public function setTagListAttribute($value)
    {
        $tags = explode(',', $value);
        
        $tagIds = [];
        
        foreach($tags as $tag)
        { 
            $insert = Tag::firstOrCreate([ 'tag' => $tag]); 
            $tagIds[] = $insert->id; 
        }
        $this->tags()->sync($tagIds);
    }
    
    public function geti18nAttribute()
    {
        switch($this->language) {
            case 'english':
                return 'en';
            case 'spanish':
                return 'es';
            case 'french':
                return 'fr';
            default:
                return $this->language;
        }
    }

    public function isLiked()
    {
        return Auth::user()->likes->contains($this->id);
    }
    // Add your validation rules here

	// Don't forget to fill this array

}
