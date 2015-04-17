<?php namespace TT\Teacher;

use Sentry;
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

        $teacherGroup = Sentry::findGroupByName('Teacher');
        $this->model->addGroup($teacherGroup);

        return $this->model;
    }
}
