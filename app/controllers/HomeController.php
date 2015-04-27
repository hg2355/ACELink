<?php namespace TT\Controllers;

use View;
use Session;
use BaseController;
use TT\Auth\Authenticator;
use TT\Service\ActivityService;

class HomeController extends BaseController {
    
    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }

	public function showHome()
    {
        return $this->getHome();   
    }

    public function getHome()
    {
        $userType = Session::get('user_type');

        $view = View::make('pages.home');

        if( strcmp($userType,'admin') === 0)
        {
            $activities = $this->activityService->all();

            return $view
                    ->with('user_type',Session::get('user_type'))
                    ->with('user',Authenticator::user())
                    ->with('activities',$activities);
        }

        else if( strcmp($userType,'parent') === 0)
        {
            $user = Authenticator::user();

            $activities = $this->activityService->getActivities($user);
            $avg = $this->activityService->getAvgActivityTime();

            return $view
                    ->with('user_type',Session::get('user_type'))
                    ->with('user',Authenticator::user())
                    ->with('activities',$activities)
                    ->with('avg',$avg);
        }

        else
        {
            return $view
                    ->with('user_type',Session::get('user_type'))
                    ->with('user',Authenticator::user());
             
        }
    }
}    
