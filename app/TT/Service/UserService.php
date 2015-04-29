<?php namespace TT\Service;

use BaseController;
use TT\Email\EmailInvite;

class UserService 
{
    
    public function invite(array $data,BaseController $listener)
    {
        $email = new EmailInvite;

        try
        {
            $email->send($data['email']);
            $listener->setMsg('messages.invite_success',['email'=>$data['email']]);
            return true;
        }

        catch(\Exception $ex)
        {
            \Log::error($ex);
            $listener->setMsg('messages.invite_failure',['email'=>$data['email']]);
            return false;
        } 
    }
}
