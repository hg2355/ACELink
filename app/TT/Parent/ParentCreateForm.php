<?php namespace TT\Parent;

use Validator;
use TT\Support\FormModel;

class ParentCreateForm extends FormModel 
{
    protected function getPreparedRules()
    {
        return [
                'parent_fullname' => 'required',
                'student_fullname' => 'required',
                'student_code' => 'required|min:6|exists:teachers_codes,student_code',
                'email' => 'required|email|unique:users',
                'relationship' => 'required'
               ];
    }

    protected function getMessages()
    {
        return [ 
        'parent_fullname.required' => 'Parent full name is required.',
        'student_fullname.required' => 'Student full name is required.',
        'email.required'=>'Email is required.',
        'email.email' => 'Email must be formatted properly.',
        'email.unique'=>'Email already taken',
        'student_code.required' => 'Student code is required..',
        'student_code.min'=>'Student code must be 6 digits.',
        'student_code.exists'=>'Student code does not exist or is already registered.',
        'relationship.required' => 'Relationship is required.'
        ];
    }

    protected function getCustomAttributes()
    {
        return [];
    }
}
