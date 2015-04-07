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

Route::group(['namespace' => 'TT\Controllers'],function() 
{
    Route::get('/', array('as'=>'welcome','uses'=>'HomeController@showHome'));
    Route::get('/login', array('as'=>'home','uses'=>'LoginController@getLogin'));
    Route::get('/add-students',array('as'=>'add.students','uses'=>'Teacher\AddStudentController@show'));

    Route::post('/teacher',array('as'=>'teacher.post','uses'=>'Teacher\SignUpController@store'));
});
