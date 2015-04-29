<?php namespace TT\User;

use TT\Support\FormModel;

class InviteForm extends FormModel{

	protected function getPreparedRules()
    {
        return
			  [ 
                'email'=>'required|email',
			];
    }

	protected function getMessages(){

		return [
                'email.required'=>'Contact email is required.',
                'email.email'=>'Contact email must be formatted as an email.'
			 ];
			   
	}

	protected function getCustomAttributes(){

		return [];	
	}

}
