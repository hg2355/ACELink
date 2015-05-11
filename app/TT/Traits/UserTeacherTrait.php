<?php namespace TT\Traits;

use TT\Support\TeacherScope;

trait UserTeacherTrait
{
    public static function bootUserTeacherTrait()
    {
        static::addGlobalScope(new TeacherScope);
    }
}


