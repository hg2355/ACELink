<?php namespace TT\Models;

use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cartalyst\Sentry\Users\Eloquent\User as CartalystUser;

class User extends CartalystUser
{

    protected $table = 'users';

    public function __construct()
    {
        $this->setHasher(new \Cartalyst\Sentry\Hashing\NativeHasher);
    }

    public function traits()
    {
        return $this->morphTo();
    }
}
