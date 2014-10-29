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
    
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = strtolower($value);
    }
    
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = strtolower($value);
    }
    
    public function getFirstNameAttribute($value){
        $first_name = ucfirst($value);
        return $first_name;
    }
    
    public function getLastNameAttribute($value){
        $last_name = ucfirst($value);
        return $last_name;
    }
}
