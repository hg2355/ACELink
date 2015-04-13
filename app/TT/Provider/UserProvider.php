<?php namespace TT\Provider;

use Illuminate\Support\ServiceProvider;

class UserProvider extends ServiceProvider 
{
    public function boot()
    {
        $this->app['sentry.user']->setModel('TT\Models\User');
    }

    public function register()
    {
        return;
    }
}
