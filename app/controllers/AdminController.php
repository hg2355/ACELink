<?php namespace TT\Controllers;

use Redirect;
use Session;
use BaseController;
use TT\Service\ActivityService;

class AdminController extends BaseController 
{
    private $activityService = null;

    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }

    public function show()
    {
        return Redirect::to('/admin/home');
    }
}
