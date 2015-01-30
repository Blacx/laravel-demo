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
        $trailer = false;

        if ($movie->trailer_url)
        {
            // Get youtube ID from URL
            parse_str( parse_url( $movie->trailer_url, PHP_URL_QUERY ), $youtube_url );
            $trailer = $youtube_url['v'];
        }

        return View::make('movie/single', compact('movie', 'trailer'));
	}

    public function movie_new()
	{

        $directors = People::role('director')->get();
        $writers = People::role('writer')->get();
        $genres = Genre::all();

		return View::make('movie/new', compact('directors', 'writers', 'genres'));
	}

    public function movie_save()
    {
        $data = Input::all();

        $movie = new Movie;
        $movie->title = $data['title'];
        $movie->poster = $data['poster'];
        $movie->overview = $data['overview'];
        $movie->imdb = $data['imdb'];
        $movie->trailer_url = $data['youtube'];
        $movie->release_date = $data['release'];
        $movie->director_id = $data['director'];
        $movie->writer_id = $data['writer'];

        if ($movie->save()) {
            foreach ($data['genre'] as $genre) {
                DB::table('movies_genres_pivot')->insert(
                    array(
                        'movie_id'  => $movie->id,
                        'genre_id'  => $genre
                    )
                );
            }
            return Redirect::to('/');
        }

    }

}
