<?php namespace TT\Controllers\Teacher;

use Input;
use BaseController;
use TT\Service\TeacherService;
use TT\Teacher\TeacherCreateForm;

class SignUpController extends BaseController {

    private $teacherService = null;

    public function __construct(TeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }

	/**
	 * Store a newly created Teacher.
	 *
	 * @return Response
	 */
	public function store()
    {
        $form = new TeacherCreateForm();
        
        $input = Input::all();

        if( ! $form->isValid($input) )
        {
            return $this->formResponse($form->getErrors());
        }

        else
        {
            if( $this->teacherService->create($input) )
                return $this->successResponse();
            else
                return $this->failResponse();       
        }
	}

}
