<?php namespace TT\Controllers\Teacher;

use View;
use BaseController;

class AddStudentController extends BaseController {

	public function show()
	{
        return View::make('pages.add-students');	        
	}

}
