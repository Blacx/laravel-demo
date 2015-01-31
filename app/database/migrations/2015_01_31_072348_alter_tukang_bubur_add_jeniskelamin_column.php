<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTukangBuburAddJeniskelaminColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tukang_bubur', function(Blueprint $table)
		{
			$table->integer('jeniskelamin')->default(1);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tukang_bubur', function(Blueprint $table)
		{
			$table->dropColumn("jeniskelamin");
		});
	}

}
