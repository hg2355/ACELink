<?php namespace TT\Controllers;

use View;
use Input;
use Session;
use Redirect;
use Response;
use BaseController;
use TT\Auth\Authenticator;

class LoginController extends BaseController {

    public function getLogin()
    {
        return View::make('pages.login')->with('user_type',Session::get('user_type'));
    }

    public function postLogin()
    {
        $credentials = Input::all();
        
        if( Authenticator::login($credentials,$this) )
            return $this->successResponse();
        else
            return $this->failResponse();

    }

    public function getLogout()
    {
        Authenticator::logout();
        Session::flush();
        return Redirect::route('welcome');
    }

}
