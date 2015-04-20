<?php namespace TT\Activity;

use TT\Models\Activity;
use TT\Support\ModelRepository;

class ActivityRepository extends ModelRepository
{
    public function __construct(Activity $activity)
    {
        $this->model = $activity;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {        
        $this->save($data);

        return $this->model;
    }

    public function update(Activity $activity, array $data)
    {
        $activity->fill($data);
        $activity->save();
    }

    public function destroy($id)
    {
        Activity::destroy($id);
    }
}
