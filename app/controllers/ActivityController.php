<?php namespace TT\Controllers;

use View;
use Input;
use Redirect;
use BaseController;
use TT\Auth\Authenticator;
use TT\Service\ActivityService;
use TT\Activity\ActivityCreateForm;

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
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
