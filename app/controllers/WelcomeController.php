<?php namespace TT\Controllers;

use View;
use BaseController;

class WelcomeController extends BaseController {

	public function showWelcome()
	{
		return View::make('pages.welcome');
    }
    
    /**
    public function getLogin()
    {
        return View::make('pages.login')->with('grades',[''=>'','K'=>'Kindergarten','First'=>'1']);
    }
    **/
}
