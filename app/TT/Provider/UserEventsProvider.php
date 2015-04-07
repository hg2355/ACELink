<?php namespace TT\Provider;

use Illuminate\Support\ServiceProvider;

class UserEventsProvider extends ServiceProvider 
{
    public function boot()
    {
        \Event::listen('user.created', 'TT\User\EventUserCreated');
    }

    public function register()
    {
        return;
    }
}
