<?php namespace TT\Controllers;

use Redirect;
use BaseController;

class AdminController extends BaseController 
{

    public function show()
    {
        return Redirect::to('/admin/home');
    }
}
