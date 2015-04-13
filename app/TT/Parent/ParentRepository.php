<?php namespace TT\Parent;

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
        
        return $this->model;
    }
}
