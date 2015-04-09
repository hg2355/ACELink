<?php namespace TT\User;

use TT\Support\EventHandler;
use TT\Email\EmailPasswordReset;

class EventPasswordReset extends EventHandler 
{
    public function handler($user,$password)
    {
        if( is_null($user) )
        {
            return;
        }

        else
        {
            $email = new EmailPasswordReset;
            $email->send($user,$password);
        }
    }
}
