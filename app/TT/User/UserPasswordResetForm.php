<?php namespace TT\User;

use TT\Support\FormModel;

class UserPasswordResetForm extends FormModel{

	protected function getPreparedRules()
    {
        return
			  [ 
			  	'email' => 'email|exists:users,email',
			];
    }

	protected function getMessages(){

		return [
				'exist' => 'The email was not found in our records.',
			 ];
			   
	}

	protected function getCustomAttributes(){

		return [];	
	}

}
