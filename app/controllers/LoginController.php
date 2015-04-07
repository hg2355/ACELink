<?php namespace TT\Controllers;

use View;
use BaseController;

class LoginController extends BaseController {

    public function getLogin()
    {
        return View::make('pages.login')->with('grades',[''=>'','K'=>'Kindergarten','1'=>'First']);
    }

    public function postLogin()
    {

    }

}
