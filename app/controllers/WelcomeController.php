<?php namespace TT\Controllers;

use View;
use Redirect;
use BaseController;
use TT\Auth\Authenticator;

class WelcomeController extends BaseController {

	public function showWelcome()
    {
        if( ! Authenticator::auth() )
        {
		    return View::make('pages.welcome');
        }

        else
        {
            return Redirect::route('home');
        }
            
    }
    
}
