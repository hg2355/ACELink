<?php namespace TT\Controllers;

use Input;
use Sentry;
use Response;
use BaseController;
use TT\Email\EmailPasswordReset;

class PasswordResetController extends BaseController {
    
    public function postReset()
    {
        try
        {
            $email = Input::get('email');
            
            $user = Sentry::findUserByLogin($email);

            $resetCode = $user->getResetPasswordCode();

            if($user->checkResetPasswordCode($resetCode))
            {
                $newPassword = str_random(16);

                if( $user->attemptResetPassword($resetCode,$newPassword) )
                {
                    $email = new EmailPasswordReset;
                    $email->send($user,$newPassword);
                }

                else
                {
                    return Response::json(['success'=>'0'],200);
                }
            }
            return Response::json(['success'=>'1'],200);
        }

        catch(\Exception $ex)
        {   
            \Log::error($ex);        
            return Response::json([],400);
        }
    }

}
