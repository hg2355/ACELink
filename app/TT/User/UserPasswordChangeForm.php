<?php namespace TT\User;

use TT\Support\FormModel;

class UserPasswordChangeForm extends FormModel{

	protected function getPreparedRules()
    {
        return
			  [ 
                'old_password' => 'required|password',
                'password'=>'required|min:8|confirmed',
			];
    }

	protected function getMessages(){

		return [
                'old_password.required' => 'Current password required.',
                'old_password.password' => 'Incorrect current password.',
                'password.required'=>'New password required.',
                'password.min'=>'Password must be a minimum of 8 characters.',
                'password.confirmed'=>'Password confirmation required.'
			 ];
			   
	}

	protected function getCustomAttributes(){

		return [];	
	}

}
