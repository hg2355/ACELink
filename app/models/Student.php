<?php namespace TT\Models;

use TT\Traits\StudentTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Student extends User
{
    use StudentTrait;

    protected $fillable = [ 'first_name',
                            'last_name',
                            'email',
                            'title',
                            'password',
                            'traits_id',
                            'traits_type',
                            'activated'
                          ];
    
    protected static $modelTraitType = 'TT\Models\StudentTrait';

    public function fill(array $fillable)
    {
        $fillable = array_add($fillable,'traits_type',self::$modelTraitType);
        $fillable = array_add($fillable,'password',str_random(16));
        $fillable = array_add($fillable,'email',$this->generateEmail());
        parent::fill($fillable);
    }

    public function teachers()
    {
        return $this->belongsToMany('TT\Models\Teacher','teachers_students','student_id','teacher_id');
    }
    
    public function partners()
    {
        return $this->belongsToMany('TT\Models\Partner','parents_students','student_id','parent_id')
                    ->withPivot('relationship');
    }

    private function generateEmail()
    {
        do
        {
            $digits = rand(100000,999999);

            $format = 'student%d@teachtogether.co';
            $email = sprintf($format,$digits);

            $count = Student::where('email', $email)->count();
        } while($count > 0);

        return $email;

    }
}
