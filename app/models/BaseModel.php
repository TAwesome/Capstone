<?php
    

class BaseModel extends Eloquent {
    
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
    
    public function setTagAttribute($value)
    {
        $this->attributes['tag'] = strtolower($value);
    }
}
