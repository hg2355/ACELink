<?php namespace TT\Traits;

use TT\Support\StudentScope;

trait StudentTrait
{
    public static function bootStudentTrait()
    {
        static::addGlobalScope(new StudentScope);
    }
}


