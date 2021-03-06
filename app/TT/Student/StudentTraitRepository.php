<?php namespace TT\Student;

use TT\Models\Student;
use TT\Models\StudentTrait;
use TT\Support\ModelRepository;

class StudentTraitRepository extends ModelRepository
{
    public function __construct(StudentTrait $teacherTrait)
    {
        $this->model = $teacherTrait;
    }

    public function create(array $data)
    {
        $this->save($data);

        return $this->model;
    }

    public function update(StudentTrait $studentTrait, array $data)
    {
        $studentTrait->fill($data);
        $studentTrait->save();        
    }

    public function findByStudent(Student $student)
    {
        $studentTrait = StudentTrait::where('id','=',$student->traits_id)->get()->first();

        return $studentTrait;
    }
}
