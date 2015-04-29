<?php namespace TT\Controllers;

use View;
use Input;
use Session;
use Redirect;
use BaseController;
use TT\User\InviteForm;
use TT\Auth\Authenticator;
use TT\Service\UserService;

class WelcomeController extends BaseController {

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

	public function showWelcome()
    {
        if( ! Authenticator::auth() )
        {
		    return View::make('pages.welcome');
        }

        else
        {
            return Redirect::route('home');
        }
            
    }

    public function postInvite()
    {
        $form = new InviteForm;

        $input = Input::all();

        if( ! $form->isValid($input) )
        {
            Session::flash('errors',$form->getValidator()->errors());
            return;
        }

        else
        {
            if( $this->userService->invite($input,$this) )
            {
                $this->flashSuccess();
            }

            else
            {
                $this->flashWarning();
            }       
        }
    }
    
}
