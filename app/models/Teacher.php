<?php namespace TT\Models;

use TT\Traits\TeacherTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Teacher extends User
{
    use TeacherTrait;

    protected $fillable = [ 'first_name',
                            'last_name',
                            'email',
                            'title',
                            'password',
                            'traits_id',
                            'traits_type',
                            'activated'
                          ];
    
    protected static $modelTraitType = 'TT\Models\TeacherTrait';

    public function fill(array $fillable)
    {
        $fillable = array_add($fillable,'traits_type',self::$modelTraitType);

        parent::fill($fillable);
    }

    public function traits()
    {
        return $this->morphTo();
    }

    public function schools()
    {
        return $this->belongsToMany('TT\Models\School','teachers_schools','user_id');
    }
}
