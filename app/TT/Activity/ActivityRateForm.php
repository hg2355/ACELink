<?php namespace TT\Activity;

use Validator;
use TT\Support\FormModel;

class ActivityRateForm extends FormModel 
{
    protected function getPreparedRules()
    {
        return [
                'experience' => 'required',
                'appropriate' => 'required',
               ];
    }

    protected function getMessages()
    {
        return [ 
        'experience.required' => 'Response to question 1 is required.',
        'appropriate.required'=>'Response to question 2 is required.',
        ];
    }

    protected function getCustomAttributes()
    {
        return [];
    }
}
