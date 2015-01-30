<?php

class MovieSeeder extends Seeder {

	public function run()
	{

		DB::table('movies')->truncate();

		$movies = array(
			array(
				'title'     => 'The Shawshank Redemption',
				'poster'    => 'http://ia.media-imdb.com/images/M/MV5BODU4MjU4NjIwNl5BMl5BanBnXkFtZTgwMDU2MjEyMDE@._V1_SX214_AL_.jpg',
				'rating'    => 9.3,
				'overview'  => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
				'release_date'  => '1994-10-14',
				'tag_line'      => 'Fear can hold you prisoner. Hope can set you free.',
				'synopsis'  => "Andy Dufresne is a young and successful banker whose life changes drastically when he is convicted and sentenced to life imprisonment for the murder of his wife and her lover. Set in the 1940's, the film shows how Andy, with the help of his friend Red, the prison entrepreneur, turns out to be a most unconventional prisoner.",
				'imdb'      => 'tt0111161',
				'trailer_url'   => 'https://www.youtube.com/watch?v=6hB3S9bIaco',
				'writer_id' => DB::table('people')->where('last_name', 'King')->first()->id,
				'producer_id'   => DB::table('people')->where('last_name', 'Darabont')->first()->id
			),
			array(
				'title'     => 'The Godfather',
				'poster'    => 'http://ia.media-imdb.com/images/M/MV5BMjEyMjcyNDI4MF5BMl5BanBnXkFtZTcwMDA5Mzg3OA@@._V1_SX214_AL_.jpg',
				'rating'    => 9.2,
				'overview'  => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',
				'release_date'  => '1972-03-24',
				'tag_line'      => "An offer you can't refuse.",
				'synopsis'  => "When the aging head of a famous crime family decides to transfer his position to one of his subalterns, a series of unfortunate events start happening to the family, and a war begins between all the well-known families leading to insolence, deportation, murder and revenge, and ends with the favorable successor being finally chosen.",
				'imdb'      => 'tt0068646',
				'trailer_url'   => 'https://www.youtube.com/watch?v=sY1S34973zA',
				'writer_id' => DB::table('people')->where('last_name', 'Puzo')->first()->id,
				'producer_id'   => DB::table('people')->where('last_name', 'Ford Coppola')->first()->id
			),
			array(
				'title'     => 'The Dark Knight',
				'poster'    => 'http://ia.media-imdb.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_SY317_CR0,0,214,317_AL_.jpg',
				'rating'    => 9.0,
				'overview'  => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, the caped crusader must come to terms with one of the greatest psychological tests of his ability to fight injustice.',
				'release_date'  => '2008-06-18',
				'tag_line'      => "Why So Serious?",
				'synopsis'  => "Batman raises the stakes in his war on crime. With the help of Lieutenant Jim Gordon and District Attorney Harvey Dent, Batman sets out to dismantle the remaining criminal organizations that plague the city streets. The partnership proves to be effective, but they soon find themselves prey to a reign of chaos unleashed by a rising criminal mastermind known to the terrified citizens of Gotham as The Joker.",
				'imdb'      => 'tt0468569',
				'trailer_url'   => 'https://www.youtube.com/watch?v=EXeTwQWrcwY',
				'writer_id' => DB::table('people')->where('last_name', 'Nolan')->where('first_name', 'Jonathan')->first()->id,
				'producer_id'   => DB::table('people')->where('last_name', 'Nolan')->where('first_name', 'Christopher')->first()->id,
			),
			array(
				'title'     => 'The Lord of the Rings: The Return of the King',
				'poster'    => 'http://ia.media-imdb.com/images/M/MV5BMjE4MjA1NTAyMV5BMl5BanBnXkFtZTcwNzM1NDQyMQ@@._V1_SX214_AL_.jpg',
				'rating'    => 8.9,
				'overview'  => "Gandalf and Aragorn lead the World of Men against Sauron's army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.",
				'release_date'  => '2003-12-07',
				'tag_line'      => "This Christmas the journey ends.",
				'synopsis'  => "While Frodo & Sam continue to approach Mount Doom to destroy the One Ring, unaware of the path Gollum is leading them, the former Fellowship aid Rohan & Gondor in a great battle in the Pelennor Fields, Minas Tirith and the Black Gates as Sauron wages his last war against Middle-Earth.",
				'imdb'      => 'tt0167260',
				'trailer_url'   => 'https://www.youtube.com/watch?v=I7YllAOqpF4',
				'writer_id' => DB::table('people')->where('last_name', 'Tolkien')->first()->id,
				'producer_id'   => DB::table('people')->where('last_name', 'Jackson')->first()->id,
			),
			array(
				'title'     => 'Interstellar',
				'poster'    => 'http://ia.media-imdb.com/images/M/MV5BMjIxNTU4MzY4MF5BMl5BanBnXkFtZTgwMzM4ODI3MjE@._V1_SX214_AL_.jpg',
				'rating'    => 8.8,
				'overview'  => "A team of explorers travel through a wormhole in an attempt to ensure humanity's survival",
				'release_date'  => '2014-11-07',
				'tag_line'      => "Go further.",
				'synopsis'  => "In the near future, Earth has been devastated by drought and famine, causing a scarcity in food and extreme changes in climate. When humanity is facing extinction, a mysterious rip in the space-time continuum is discovered, giving mankind the opportunity to widen its lifespan. A group of explorers must travel beyond our solar system in search of a planet that can sustain life. The crew of the Endurance are required to think bigger and go further than any human in history as they embark on an interstellar voyage into the unknown. Coop, the pilot of the Endurance, must decide between seeing his children again and the future of the human race.",
				'imdb'      => 'tt0816692',
				'trailer_url'   => 'https://www.youtube.com/watch?v=0vxOhd4qlnA',
				'writer_id' => DB::table('people')->where('last_name', 'Tolkien')->first()->id,
				'producer_id'   => DB::table('people')->where('last_name', 'Jackson')->first()->id,
			),
		);

		DB::table('movies')->insert($movies);

	}

}