<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmStatisticTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_statistic', function(Blueprint $table)
		{
			$table->integer('statistic_id', true);
			$table->string('statistic_key');
			$table->text('statistic_value', 65535);
			$table->integer('statistic_total');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_statistic');
	}

}
