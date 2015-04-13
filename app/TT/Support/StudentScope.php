<?php namespace TT\Support;

use Illuminate\Database\Eloquent\Builder; 
use Illuminate\Database\Eloquent\ScopeInterface;

class StudentScope implements ScopeInterface
{
    protected static $studentTraitModel = 'TT\Models\StudentTrait';

    public function apply(Builder $builder)
    {
        $builder->where('traits_type',self::$studentTraitModel);
    }
    
    public function remove(Builder $builder)
    {
        return;
    }
}
