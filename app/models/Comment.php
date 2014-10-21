<?php

class Comment extends BaseModel {
    public function users()
    {
        return $this->belongsTo('User');
    }
}
