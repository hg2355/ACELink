<?php namespace TT\Controllers;

use Input;
use Sentry;
use Response;
use BaseController;
use TT\Service\TeacherService;
use TT\User\UserPasswordResetForm;

class PasswordResetController extends BaseController {

    private $teacherService = null;

    public function __construct(TeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }

    public function postReset()
    {   
        $input = Input::all();

        $form = new UserPasswordResetForm;

        if( !$form->isValid($input) )
        {
            return $this->formResponse($form->getErrors());
        }

        else
        {
            if( $this->teacherService->resetPassword($input) )
            {
                return $this->successResponse();
            }

            else
            {
                return $this->failResponse();
            }   
        }
    }

}
