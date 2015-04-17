<?php namespace TT\Parent;

use Sentry;
use TT\Models\Partner;
use TT\Support\ModelRepository;

class ParentRepository extends ModelRepository
{
    public function __construct(Partner $parent)
    {
        $this->model = $parent;
    }

    public function create(array $data)
    {
        $this->save($data);
        
        $parentGroup = Sentry::findGroupByName('Student');

        $this->model->addGroup($parentGroup);

        return $this->model;
    }
}
