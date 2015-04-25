<?php namespace TT\Controllers;

use View;
use Input;
use Redirect;
use BaseController;
use TT\Auth\Authenticator;
use TT\Service\ActivityService;
use TT\Activity\ActivityRateForm;
use TT\Activity\ActivityCreateForm;
use TT\Activity\ActivityUpdateForm;

class ActivityController extends BaseController {

    private $activityService = null;

    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pages.activity.create')->with('user',Authenticator::user());
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
    {
        $form = new ActivityCreateForm;
        $input = Input::all();

        if( ! $form->isValid($input) )
        {
            return Redirect::back()->withInput()->withErrors($form->getValidator()->errors());
        }

        else
        {
            if( $this->activityService->create($input,$this) )
            {
                $this->flashSuccess();
                return Redirect::route('home');
            }

            else
            {
                $this->flashWarning();
                return Redirect::route('home');
            }
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $activity = $this->activityService->find($id);
        
        return View::make('pages.activity.show')->with('activity',$activity)
                                                ->with('user',Authenticator::user());
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $activity = $this->activityService->find($id);

        return View::make('pages.activity.edit')->with('activity',$activity);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $form = new ActivityUpdateForm($id);

        $input = input::all();

        if( ! $form->isValid($input) )
        {
            return Redirect::back()->withErrors($input)->withInput();
        }

        $input = Input::all();

        if( ! $form->isValid($input) )
        {
            return Redirect::back()->withInput()->withErrors($form->getValidator()->errors());
        }

        else
        {
            if( $this->activityService->update($id,$input,$this) )
            {
                $this->flashSuccess();
                return Redirect::route('home');
            }

            else
            {
                $this->flashWarning();
                return Redirect::route('home');
            }
        }

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        if( $this->activityService->destroy($id,$this) )
        {
            return $this->flashInfo();
        }
        else
        {
            $this->flashWarning();
        }
    }

    public function getComplete($id)
    {
        $user = Authenticator::user();
        
        $activity = $this->activityService->find($id);

        if( $id != 1)
        {
            
            return View::make('pages.activity.rate')->with('activity',$activity)->with('user',$user);
        }

        else
        {
            if( $this->activityService->complete($activity,[],$user,$this) )
            {
                $this->flashSuccess();
            }

            else
            {
                $this->flashWarning();
            }

        
            return Redirect::route('home');

        }
    }

    public function postComplete($id)
    {
        $input = Input::all();

        $form = new ActivityRateForm;

        if( ! $form->isValid($input) )
        {
            return Redirect::back()->withInput()->withErrors($form->getErrors());
        }

        $user = Authenticator::user();
        
        $activity = $this->activityService->find($id);

        if( $this->activityService->complete($activity,$input,$user,$this) )
        {
            $this->flashSuccess();
        }

        else
        {
            $this->flashWarning();
        }

        
        return Redirect::route('home');

    }

}
