<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function __construct()
	{
		$this->layout = 'master';
	}



	public function movie_index()
	{
		$movies = Movie::all();
		return View::make('movie/index', compact('movies'));
	}

	public function movie_single($id)
	{
		$movie = Movie::where('id', $id)->first();

		return View::make('movie/single', compact('movie'));
	}

}
