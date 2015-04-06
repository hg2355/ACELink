<?php namespace TT\Teacher;

use TT\Models\Teacher;
use TT\Support\ModelRepository;

class TeacherRepository extends ModelRepository
{
    public function __construct(Teacher $teacher)
    {
        $this->model = $teacher;
    }

    public function create(array $data)
    {
        $this->save($data);
        
        return $this->model;
    }
}
