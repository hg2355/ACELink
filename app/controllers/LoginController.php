<?php namespace TT\Controllers;

use View;
use Input;
use Response;
use BaseController;
use TT\Auth\Authenticator;

class LoginController extends BaseController {

    public function getLogin()
    {
        return View::make('pages.login')->with('grades',[''=>'','K'=>'Kindergarten','1'=>'First']);
    }

    public function postLogin()
    {
        $credentials = Input::all();
        
        if( Authenticator::login($credentials,$this) )
            return $this->successResponse;
        else
            return $this->failResponse;

    }

}
