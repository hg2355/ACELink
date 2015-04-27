<?php namespace TT\Validator;

use Sentry;
use Illuminate\Validation\Validator;

class CustomValidation extends Validator
{
    public function validatePassword($field,$value,$params)
    {
        $currentPassword = $value;
        
        $user = Sentry::getUser();

        return $user->checkPassword($currentPassword);
    }

}
?>
