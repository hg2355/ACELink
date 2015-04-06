<?php namespace TT\Traits;

use TT\Support\TeacherScope;

trait TeacherTrait
{
    public static function bootTeacherTrait()
    {
        static::addGlobalScope(new TeacherScope);
    }
}


