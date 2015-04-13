<?php namespace TT\Controllers\Parent;

use Input;
use BaseController;
use TT\Parent\ParentCreateForm;
use TT\Service\ParentService;

class SignUpController extends BaseController {

    private $parentService = null;

    public function __construct(ParentService $parentService)
    {
        $this->parentService = $parentService;
    }

	public function store()
	{
        $form = new ParentCreateForm;
        $input = Input::all();

        if( ! $form->isValid($input) )
        {
            return $this->formResponse($form->getErrors());
        }

        else
        {
            if( $this->parentService->createWithStudent($input) )
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
