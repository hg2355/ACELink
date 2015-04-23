<?php namespace TT\Traits;

use TT\Support\TeacherScope;

trait UserTeacherTrait
{
    public static function bootTeacherTrait()
    {
        static::addGlobalScope(new TeacherScope);
    }
}


