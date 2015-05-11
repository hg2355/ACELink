<?php namespace TT\Support;

use Illuminate\Database\Eloquent\Builder; 
use Illuminate\Database\Eloquent\ScopeInterface;

class ParentScope implements ScopeInterface
{
    protected static $parentTraitModel = 'TT\Models\ParentTrait';

    public function apply(Builder $builder)
    {
        $builder->where('traits_type','=',self::$parentTraitModel);
    }
    
    public function remove(Builder $builder)
    {
        return;
    }
}
