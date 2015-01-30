<?php

class MovieGenreSeeder extends Seeder {

	public function run()
	{

		$movie_genres = array(
			array(
				'movie_id' => 1,
				'genre_id'  => 1
			),
			array(
				'movie_id' => 1,
				'genre_id'  => 2
			),
			array(
				'movie_id' => 2,
				'genre_id'  => 1
			),
			array(
				'movie_id' => 2,
				'genre_id'  => 2
			),
			array(
				'movie_id' => 3,
				'genre_id'  => 1
			),
			array(
				'movie_id' => 3,
				'genre_id'  => 2
			),
			array(
				'movie_id' => 3,
				'genre_id'  => 3
			),
			array(
				'movie_id' => 4,
				'genre_id'  => 7
			),
			array(
				'movie_id' => 4,
				'genre_id'  => 8
			),
			array(
				'movie_id' => 5,
				'genre_id'  => 7
			),
			array(
				'movie_id' => 5,
				'genre_id'  => 9
			)
		);

		DB::table('movies_genres_pivot')->insert($movie_genres);

	}

}