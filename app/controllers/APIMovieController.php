<?php

class APIMovieController extends BaseController {

	public function showMovies()
	{

		return Response::json(Movie::all());

	}

}