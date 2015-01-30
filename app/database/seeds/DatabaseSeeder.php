<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('PeopleSeeder');
		$this->call('MovieSeeder');
		$this->call('GenreSeeder');
		$this->call('MovieGenreSeeder');
	}

}
