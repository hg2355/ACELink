<?php namespace TT\School;

use TT\Models\School;
use TT\Support\ModelRepository;

class SchoolRepository extends ModelRepository
{
    public function __construct(School $school)
    {
        $this->model = $school;
    }

    public function create(array $data)
    {
        $data['name'] = $data['school'];

        unset($data['school']);
        
        $this->save($data);

        return $this->model;
    }
}
