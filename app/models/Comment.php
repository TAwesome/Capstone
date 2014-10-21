<?php

class Comment extends BaseModel {
    public function users()
    {
        return $this->belongsTo('User');
    }
    public function posts()
    {
        return $this->belongsTo('Post');
    }
}
