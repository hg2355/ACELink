<?php namespace TT\Traits;

use TT\Support\StudentScope;

trait UserStudentTrait
{
    public static function bootStudentTrait()
    {
        static::addGlobalScope(new StudentScope);
    }
}


