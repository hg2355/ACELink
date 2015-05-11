<?php namespace TT\Traits;

use TT\Support\ParentScope;

trait UserParentTrait
{
    public static function bootUserParentTrait()
    {
        static::addGlobalScope(new ParentScope);
    }
}


