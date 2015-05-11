<?php namespace TT\Models;

use TT\Traits\UserParentTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cartalyst\Sentry\Users\Eloquent\User as CartalystUser;

class Partner extends CartalystUser
{
    use UserParentTrait;

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

    public function fill(array $fillable)
    {
        $fillable = array_add($fillable,'traits_type',self::$modelTraitType);

        parent::fill($fillable);
    }

    public function getRelationshipAttribute()
    {
        return $this->pivot->relationship;
    }
    
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

}
