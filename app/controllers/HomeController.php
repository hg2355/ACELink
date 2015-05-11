<?php namespace TT\Controllers;

use View;
use Session;
use BaseController;
use TT\Auth\Authenticator;
use TT\Service\ParentService;
use TT\Service\TeacherService;
use TT\Service\ActivityService;

class HomeController extends BaseController {
    
    public function __construct(ActivityService $activityService, ParentService $parentService, TeacherService $teacherService)
    {
        $this->activityService = $activityService;
        $this->parentService = $parentService;
        $this->teacherService = $teacherService;
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
            $parents = $this->parentService->all();
            $teachers = $this->teacherService->all();

            return $view
                    ->with('user_type',$userType)
                    ->with('user',Authenticator::user())
                    ->with('activities',$activities)
                    ->with('parents',$parents)
                    ->with('teachers',$teachers);
        }

        else if( strcmp($userType,'parent') === 0)
        {
            $user = Authenticator::user();

            $activities = $this->activityService->getActivities($user);
            $avg = $this->activityService->getAvgActivityTime();

            return $view
                    ->with('user_type',$userType)
                    ->with('user',Authenticator::user())
                    ->with('activities',$activities)
                    ->with('avg',$avg);
        }

        else
        {
            return $view
                    ->with('user_type',$userType)
                    ->with('user',Authenticator::user());
             
        }
    }

    public function getTOS()
    {
        return View::make('pages.tos');
    }

    public function getPrivacy()
    {
        return View::make('pages.privacy');
    }
}    
