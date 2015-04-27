<?php namespace TT\Controllers;

use View;
use Input;
use Sentry;
use Redirect;
use Response;
use BaseController;
use TT\Auth\Authenticator;
use TT\Service\PasswordService;
use TT\User\UserPasswordResetForm;
use TT\User\UserPasswordChangeForm;

class PasswordResetController extends BaseController {

    private $pwdService = null;

    public function __construct(PasswordService $pwdService)
    {
        $this->pwdService = $pwdService;
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
            if( $this->pwdService->resetPassword($input) )
            {
                return $this->successResponse();
            }

            else
            {
                return $this->failResponse();
            }   
        }
    }

    public function getChange()
    {
        $user = Authenticator::user();

        return View::make('pages.pwd')->with('user',$user);
    }

    public function postChange()
    {
        $input = Input::all();

        $form = new UserPasswordChangeForm;

        if( ! $form->isValid($input) )
        {
            return Redirect::back()->withInput()->withErrors($form->getErrors());
        }

        else
        {
            if( $this->pwdService->changePassword($input,$this) )
            {
                $this->flashSuccess();
            }

            else
            {
                $this->flashWarning();
            }

            return Redirect::route('home');
        }
    }

}
