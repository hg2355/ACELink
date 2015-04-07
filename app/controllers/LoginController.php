<?php namespace TT\Controllers;

use View;
use Input;
use Sentry;
use Response;
use BaseController;

class LoginController extends BaseController {

    public function getLogin()
    {
        return View::make('pages.login')->with('grades',[''=>'','K'=>'Kindergarten','1'=>'First']);
    }

    public function postLogin()
    {
        try
        {
           $email = Input::get('email');
           $password = Input::get('password');
            
           Sentry::authenticate(['email'=> $email,'password'=> $password]);

           $user = Sentry::getUser();
           $fullname = $user->first_name.' '.$user->last_name;
           return Response::json(['success'=>'1','msg'=>'You are logged in as '.$fullname],200);
        }

        catch(\Exception $ex)
        {
            return Response::json(['success'=>'0','msg'=>'Incorrect login or password'],200);
        }
    }

}
