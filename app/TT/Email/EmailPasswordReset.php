<?php namespace TT\Email;

use Mail;
use TT\Models\User;

class EmailPasswordReset
{
    private $layout = 'emails.password-reset';
    private $from = 'no-reply@teachtogether.co';
    private $subject = 'Password Reset';

    public function send($user, $password)
    {
        $data['user'] = $user;
        $data['password'] = $password;

        Mail::send($this->layout, $data, function($message) use ($data)
        {
            $message->from($this->from);
            $message->to($data['user']->email)->subject($this->subject);
        });
    }
}
