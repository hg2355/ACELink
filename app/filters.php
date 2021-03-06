<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('session',function()
{
    
    if( ! Session::has('user_type') )
    {
        if (Request::ajax())
		{
			return Response::make('Nice try', 403);
        }

		else
		{
			return Redirect::route('welcome');
		}
    }

    if( TT\Auth\Authenticator::auth() )
    {
        return Redirect::route('home');
    }

});

Route::filter('auth', function()
{
	if ( !TT\Auth\Authenticator::auth() )
    {
        if( Route::input('user_type') )
        {
            $userType = Route::input('user_type');

            Session::put('user_type',$userType);
        }

		if (Request::ajax())
		{
			return Response::make('Not logged in.', 403);
        }

		else
		{
			return Redirect::route('login.get');
		}
    }
});

Route::filter('nocache',function($route, $request, $response)
{
    // No caching for pages, you can do some checks before
        $response->header("Pragma", "no-cache");
        $response->header("Cache-Control", "no-store, no-cache, must-revalidate, max-age=0");
});

Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
