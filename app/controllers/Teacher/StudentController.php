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

    public function printCodes()
    {
        $input = Input::all();

        $response = $this->teacherService->generateCodes($input);

        if( $response )
        {
            return $this->getFileURL($response);
        }

        else
            return $this->failResponse();
    }

}
