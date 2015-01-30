<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('movies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('poster');
			$table->float('rating')->nullable();
			$table->string('overview')->nullable();
			$table->date('release_date');
			$table->string('tag_line')->nullable();
			$table->text('synopsis')->nullable();
			$table->string('imdb')->nullable();
			$table->string('trailer_url')->nullable();
			$table->integer('writer_id');
			$table->integer('director_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('movies');
	}

}
