<?php namespace TT\Traits;

use TT\Support\ParentScope;

trait ParentTrait
{
    public static function bootParentTrait()
    {
        static::addGlobalScope(new ParentScope);
    }
}


