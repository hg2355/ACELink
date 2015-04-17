<?php namespace TT\Models;

class Activity extends \Eloquent
{
    protected $table = 'activities';
    
    protected $fillable = ['title','description_url','activity_url','time'];
}
