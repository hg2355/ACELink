<?php namespace TT\Models;

use TT\Traits\UserParentTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Partner extends \Eloquent
{
    use UserParentTrait;
    use SoftDeletingTrait;

    protected $fillable = [ 'first_name',
                            'last_name',
                            'email',
                            'title',
                            'password',
                            'traits_id',
                            'traits_type',
                            'activated'
                          ];
    
    protected static $modelTraitType = 'TT\Models\ParentTrait';
    protected $table = 'users';

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
        return $this->belongsToMany('TT\Models\Student','parents_students','parent_id','student_id');
    }

    public function students()
    {
        return $this->belongsToMany('TT\Models\Student','parents_students','parent_id','student_id');
    }

    public function fill(array $fillable)
    {
        $fillable = array_add($fillable,'traits_type',self::$modelTraitType);

        parent::fill($fillable);
    }

    public function getRelationshipAttribute()
    {
        return $this->pivot->relationship;
    }

}
