<?php namespace TT\Activity;

use TT\Models\Activity;
use TT\Support\ModelRepository;

class ActivityRepository extends ModelRepository
{
    public function __construct(Activity $activity)
    {
        $this->model = $activity;
    }

    public function create(array $data)
    {        
        $this->save($data);

        return $this->model;
    }
}
