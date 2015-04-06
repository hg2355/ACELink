<?php namespace TT\Support;

use Illuminate\Database\Eloquent\Builder; 
use Illuminate\Database\Eloquent\ScopeInterface;

class TeacherScope implements ScopeInterface
{
    protected static $teacherTraitModel = 'TT\Models\TeacherTrait';

    public function apply(Builder $builder)
    {
        $builder->where('traits_type',self::$teacherTraitModel);
    }
    
    public function remove(Builder $builder)
    {
        return;
    }
}
