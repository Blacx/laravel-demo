<?php

class PeopleSeeder extends Seeder {

	public function run()
	{

		DB::table('people')->truncate();

		$people = array(
			array(
				'first_name'    => 'Frank',
				'last_name'     => 'Darabont',
				'role'          => 'director'
			),
			array(
				'first_name'    => 'Stephen',
				'last_name'     => 'King',
				'role'          => 'writer'
			),
			array(
				'first_name'    => 'Francis',
				'last_name'     => 'Ford Coppola',
				'role'          => 'director'
			),
			array(
				'first_name'    => 'Mario',
				'last_name'     => 'Puzo',
				'role'          => 'writer'
			),
			array(
				'first_name'    => 'Christopher',
				'last_name'     => 'Nolan',
				'role'          => 'director'
			),
			array(
				'first_name'    => 'Jonathan',
				'last_name'     => 'Nolan',
				'role'          => 'writer'
			),
			array(
				'first_name'    => 'Peter',
				'last_name'     => 'Jackson',
				'role'          => 'director'
			),
			array(
				'first_name'    => 'J.R.R.',
				'last_name'     => 'Tolkien',
				'role'          => 'Writer'
			),

		);

		DB::table('people')->insert($people);

	}

}