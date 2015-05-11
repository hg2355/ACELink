<?php namespace TT\Traits;

use TT\Support\StudentScope;

trait UserStudentTrait
{
    public static function bootUserStudentTrait()
    {
        static::addGlobalScope(new StudentScope);
    }
}


