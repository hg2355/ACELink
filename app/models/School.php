<?php namespace TT\Models;

class School extends \Eloquent
{
    protected $table = 'schools';
    
    protected $fillable = ['zipcode','name'];

    public function teachers()
    {
        return $this->belongsToMany('TT\Models\Teacher','teachers_schools','school_id');
    }
}
