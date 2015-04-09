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

    public function findOrCreate(array $data)
    {
        
        $school = $this->model->where('name','=',$data['school'])->first();

        if( !is_null($school) )
            return $school;

        $data['name'] = $data['school'];

        unset($data['school']);
        
        $this->save($data);

        return $this->model;
    }

}
