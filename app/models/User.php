<?php namespace TT\Models;

use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cartalyst\Sentry\Users\Eloquent\User as CartalystUser;

class User extends CartalystUser
{
    use SoftDeletingTrait;

    protected $table = 'users';

    public function __construct()
    {
        $this->setHasher(new \Cartalyst\Sentry\Hashing\NativeHasher);
    }

    public function scopeEmail($query,$email)
    {
        return $query->where('email','=',$email)->first();
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function traits()
    {
        return $this->morphTo();
    }

    public function groups()
    {   
        return $this->belongsToMany(static::$groupModel, static::$userGroupsPivot, 'user_id', 'group_id');
    }

    public function isTeacher()
    {
        return $this->hasAnyAccess(['teacher']);
    }

    public function isAdmin()
    {
        return $this->hasAnyAccess(['admin']);
    }

    public function isParent()
    {
        return $this->hasAnyAccess(['parent']);
    }

    public function student()
    {
        if( $this->traits_type === 'TT\Models\ParentTrait')
            return $this->belongsToMany('TT\Models\Student','parents_students','parent_id','student_id');
        else
            return $this->belongsToMany('TT\Models\Student','teachers_students','teacher_id','student_id');
    }

    public function students()
    {
        if( $this->traits_type === 'TT\Models\ParentTrait')
            return $this->belongsToMany('TT\Models\Student','parents_students','parent_id','student_id');
        else
            return $this->belongsToMany('TT\Models\Student','teachers_students','teacher_id','student_id');
    }

    public function activities()
    {
        return $this->belongsToMany('TT\Models\Activity','users_activities','user_id','activity_id');
    }
}
