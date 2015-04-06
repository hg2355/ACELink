<?php namespace TT\Controllers\Teacher;

use Input;
use Response;
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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
    {
        $form = new TeacherCreateForm;
        
        $input = Input::all();

        if( ! $form->isValid($input) )
        {
            return Response::json(['success'=> 0, 'errors' => $form->getErrors()],200);
        }

        else
        {
            if( $this->teacherService->create($input) )
                return Response::json(['success'=> 1],200);
            else
                return Response::json(['success'=> 0],400);
        }
	}

}
