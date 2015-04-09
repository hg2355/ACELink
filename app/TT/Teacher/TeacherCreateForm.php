<?php namespace TT\Teacher;

use Validator;
use TT\Support\FormModel;

class TeacherCreateForm extends FormModel 
{
    protected function getPreparedRules()
    {
        return [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users',
                'grade' => 'required',
                'zipcode' => 'required|regex:/^\d{5,}$/',
                'school' => 'required' 
               ];
    }

    protected function getMessages()
    {
        return [ 
        'first_name.required' => 'First name is required.',
        'last_name.required' => 'Last name is required.',
        'email.required'=>'Email is required.',
        'email.email' => 'Email must be formatted properly.',
        'zip.required'=>'A 5 digit zipcode required.',
        'zip.regex'=>'A 5 digit zicode required.',
        'grade.required' => 'A grade is required.',
        'school.required' => 'A school name is required.'
        ];
    }

    protected function getCustomAttributes()
    {
        return [];
    }
}
