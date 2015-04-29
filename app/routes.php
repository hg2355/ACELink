<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['before'=>'session','namespace' => 'TT\Controllers'],function()
{
    Route::get('/login', array('as'=>'login.get','uses'=>'LoginController@getLogin'));
    Route::post('/login', array('as'=>'login.post','uses'=>'LoginController@postLogin'));

    Route::post('/teacher',array('as'=>'teacher.post','uses'=>'Teacher\SignUpController@store'));
    Route::post('/parent',array('as'=>'parent.post','uses'=>'Parent\SignUpController@store'));
    Route::post('/pwd/reset', array('as'=>'pwd.reset.post','uses'=>'PasswordResetController@postReset'));

});


Route::group(['namespace' => 'TT\Controllers'],function() 
{
    Route::get('/', array('as'=>'welcome','uses'=>'WelcomeController@showWelcome'));
    Route::get('/admin',array('as'=>'admin','uses'=>'AdminController@show'));
    Route::post('/invite',array('as'=>'invite','uses'=>'WelcomeController@postInvite'));   
});

Route::group(['before' => 'auth', 'namespace' => 'TT\Controllers'], function()
{
    Route::get('/logout',array('as'=>'logout.get','uses'=>'LoginController@getLogout'));
    Route::get('/home',array('as'=>'home','uses'=>'HomeController@showHome'));
    Route::get('/{user_type}/home',array('as'=>'home.user','uses'=>'HomeController@getHome'));

    Route::post('/print-codes',array('as'=>'print.codes','uses'=>'Teacher\StudentController@printCodes'));
    Route::resource('activity','ActivityController');

    Route::get('/activity/{id}/complete',array('as'=>'activity.complete.get','uses'=>'ActivityController@getComplete'));
    Route::post('/activity/{id}/complete',array('as'=>'activity.complete.post','uses'=>'ActivityController@postComplete'));
    
    Route::get('pwd/change',array('as'=>'pwd.change.get','uses'=>'PasswordResetController@getChange'));
    Route::post('pwd/change',array('as'=>'pwd.change.post','uses'=>'PasswordResetController@postChange'));

});
