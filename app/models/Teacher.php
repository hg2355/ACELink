<?php namespace TT\Models;

use TT\Traits\UserTeacherTrait;
use Cartalyst\Sentry\Users\Eloquent\User as CartalystUser;

class Teacher extends CartalystUser
{
    use UserTeacherTrait;

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
    protected $table = 'users';

    public function fill(array $fillable)
    {
        $fillable = array_add($fillable,'traits_type',self::$modelTraitType);

        parent::fill($fillable);
    }

    public function schools()
    {
        return $this->belongsToMany('TT\Models\School','teachers_schools');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

}
