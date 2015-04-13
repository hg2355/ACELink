<?php namespace TT\Controllers\Teacher;

use View;
use Input;
use BaseController;
use TT\Auth\Authenticator;
use TT\Service\TeacherService;

class StudentController extends BaseController {
    
    private $teacherService = null;

    public function __construct(TeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }

	public function show()
    {
        return View::make('pages.students')->with('teacher',Authenticator::user());	        
    }

    public function printCodes()
    {
        $input = Input::all();

        $response = $this->teacherService->generateCodes($input);

        if( $response )
        {
            //return $this->successResponse();
            //return $this->getPDFDownload($response);
            return $this->getFileURL($response);
        }

        else
            return $this->failResponse();
    }

}
