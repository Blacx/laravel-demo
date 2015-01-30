<?php

class GenreSeeder extends Seeder {

	public function run()
	{

		DB::table('genres')->truncate();

		$genres = array(
			array(
				'name' => 'Crime'
			),
			array(
				'name' => 'Drama'
			),
			array(
				'name' => 'Action'
			),
			array(
				'name' => 'Horror'
			),
			array(
				'name' => 'Thriller'
			),
			array(
				'name' => 'Comedy'
			),
			array(
				'name' => 'Adventure'
			),
			array(
				'name' => 'Fantasy'
			),
			array(
				'name' => 'Sci-Fi'
			)
		);

		DB::table('genres')->insert($genres);

	}

}