<?php namespace TT\Activity;

use Validator;
use TT\Support\FormModel;

class ActivityCreateForm extends FormModel 
{
    protected function getPreparedRules()
    {
        return [
                'title' => 'required|unique:activities',
                'description' => 'required',
                'time' => 'required|numeric|min:1',
                'activity' => 'required',
               ];
    }

    protected function getMessages()
    {
        return [ 
        'title.required' => 'Title is required.',
        'time.required'=>'Time is required.',
        'title.unique'=>'Title already being used.',
        'time.numeric' => 'Time must be inputted in a numeric format.',
        'time.min'=>'Time must be at least 1 minute.',
        ];
    }

    protected function getCustomAttributes()
    {
        return [];
    }
}
