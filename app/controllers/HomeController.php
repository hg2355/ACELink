<?php namespace TT\Controllers;

use View;
use Session;
use BaseController;
use TT\Auth\Authenticator;

class HomeController extends BaseController {

	public function showHome()
    {   
        return View::make('pages.home')
                    ->with('user_type',Session::get('user_type'))
                    ->with('user',Authenticator::user());
    }
    
}
