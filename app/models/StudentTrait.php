<?php namespace TT\Models;

class StudentTrait extends \Eloquent
{
    protected $table = 'students_traits';

    public $timestamps = false;

    protected $fillable = ['student_code','total_activity_time'];
}
