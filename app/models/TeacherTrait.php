<?php namespace TT\Models;

class TeacherTrait extends \Eloquent
{
    protected $table = 'teachers_traits';

    public $timestamps = false;

    protected $fillable = ['grade'];
}
