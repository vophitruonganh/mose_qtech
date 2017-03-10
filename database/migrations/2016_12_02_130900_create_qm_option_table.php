<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmOptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_option', function(Blueprint $table)
		{
			$table->bigInteger('option_id', true);
			$table->string('option_name', 191)->default('')->index('option_name');
			$table->text('option_value');
			$table->string('autoload', 20)->default('yes')->index('autoload');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_option');
	}

}
