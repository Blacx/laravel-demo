<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTukangBuburTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tukang_bubur', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->float('harga');
			$table->float('pajak');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tukang_bubur');
	}

}
