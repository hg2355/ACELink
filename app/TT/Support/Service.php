<?php namespace TT\Support;

use BaseController;

abstract class Service
{
    private $listener = null;

    public function setListener(BaseController $listener)
    {
        $this->listener = $listener;
    }
}
