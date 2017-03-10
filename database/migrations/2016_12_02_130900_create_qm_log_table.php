<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_log', function(Blueprint $table)
		{
			$table->bigInteger('log_id', true)->unsigned();
			$table->bigInteger('user_id')->unsigned()->default(0)->index('user_id');
			$table->bigInteger('post_id')->unsigned()->default(0)->index('post_id');
			$table->bigInteger('attachment_id')->unsigned()->default(0)->index('attachment_id');
			$table->string('order_code', 200)->default('0')->index('order_code');
			$table->string('log_date')->index('log_date');
			$table->text('log_content')->nullable();
			$table->text('log_description')->nullable();
			$table->string('log_type', 50);
			$table->string('log_action', 250);
			$table->string('log_status', 20)->default('open')->index('log_status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_log');
	}

}
