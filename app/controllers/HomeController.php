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

    private function getHome()
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
            
            return $view
                    ->with('user_type',Session::get('user_type'))
                    ->with('user',Authenticator::user())
                    ->with('activities',$activities);
        }

        else
        {
            return $view
                    ->with('user_type',Session::get('user_type'))
                    ->with('user',Authenticator::user());
             
        }
    }
}    
