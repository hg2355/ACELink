<?php namespace TT\Traits;

use TT\Support\ParentScope;

trait UserParentTrait
{
    public static function bootParentTrait()
    {
        static::addGlobalScope(new ParentScope);
    }
}


