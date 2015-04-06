<?php namespace TT\Controllers;

use View;
use BaseController;

class LoginController extends BaseController {

    public function getLogin()
    {
        return View::make('pages.login')->with('grades',[''=>'','K'=>'Kindergarten','First'=>'1']);
    }

    public function postLogin()
    {

    }

}
