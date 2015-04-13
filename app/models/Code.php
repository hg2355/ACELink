<?php namespace TT\Models;

class Code extends \Eloquent
{
    protected $table = 'teachers_codes';
    
    protected $fillable = ['teacher_id','student_code'];
    
    public $primaryKey = 'student_code';   
    public $timestamps = false;
    public $incrementing = false; 

    public function teacher()
    {
        return $this->belongsToMany('TT\Models\Teacher','teachers_codes','student_code','teacher_id')->first();
    }

}
