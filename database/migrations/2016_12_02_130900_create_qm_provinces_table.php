<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmProvincesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_provinces', function(Blueprint $table)
		{
			$table->integer('province_id')->unsigned()->index('province_id');
			$table->string('province_name');
			$table->string('province_type', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_provinces');
	}

}
