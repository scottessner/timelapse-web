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

Route::get('/', function()
{
	$im = imagecreatetruecolor(800, 600);
	return View::make('hello');
});

Route::get('users',function()
{
	return View::make('users');
});

Route::resource('frames', 'FramesController');
Route::get('frames/showRaw/{id}', 'FramesController@showRaw');

Route::resource('cameras', 'CamerasController');
Route::get('addnewcamera', function(){
	$project = new Project;
	$project->name = 'Essner - C&H Construction';
	$project->description = 'Building a new home';
	$project->save();

	$camera = new Camera;
	$camera->project()->associate($project);
	$camera->save();

	return View::make('hello');
});

Route::resource('projects', 'ProjectsController');