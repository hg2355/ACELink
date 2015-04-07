<?php namespace TT\User;

use TT\Support\EventHandler;
use TT\Email\EmailNewUser;

class EventUserCreated extends EventHandler 
{
    public function handler($user,$password)
    {
        if( is_null($user) )
        {
            return;
        }

        else
        {
            $email = new EmailNewUser;
            $email->send($user,$password);
        }
    }
}
