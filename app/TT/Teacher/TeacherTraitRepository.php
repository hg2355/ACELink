<?php namespace TT\Teacher;

use TT\Models\TeacherTrait;
use TT\Support\ModelRepository;

class TeacherTraitRepository extends ModelRepository
{
    public function __construct(TeacherTrait $teacherTrait)
    {
        $this->model = $teacherTrait;
    }

    public function create(array $data)
    {
        $this->save($data);

        return $this->model;
    }
}
