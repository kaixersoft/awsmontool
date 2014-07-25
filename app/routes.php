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
		
Route::any('/', function()
{
	
	$ec2List = App::make('AwsController')->getTest();

	return View::make('pages.home',[
			'ec2data1' => $ec2List['act1'],
			'ec2data2' => $ec2List['act2']
			]);

});

