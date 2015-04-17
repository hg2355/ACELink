<?php namespace TT\Student;

use Sentry;
use TT\Models\Student;
use TT\Support\ModelRepository;

class StudentRepository extends ModelRepository
{
    public function __construct(Student $teacher)
    {
        $this->model = $teacher;
    }

    public function create(array $data)
    {
        $this->save($data);
        
        $studentGroup = Sentry::findGroupByName('Student');

        $this->model->addGroup($studentGroup);

        return $this->model;
    }
}
