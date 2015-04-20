<?php namespace TT\Activity;

use Validator;
use TT\Support\FormModel;

class ActivityUpdateForm extends FormModel 
{
    public function __construct($id)
    {
        $this->id = $id;
    }
    protected function getPreparedRules()
    {
        return [
                'title' => 'required|unique:activities,title,'.$this->id,
                'time' => 'required|numeric|min:1',
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
