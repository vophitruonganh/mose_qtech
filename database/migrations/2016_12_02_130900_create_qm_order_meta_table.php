<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmOrderMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_order_meta', function(Blueprint $table)
		{
			$table->bigInteger('om_id', true)->unsigned();
			$table->bigInteger('order_id')->unsigned()->default(0)->index('order_id');
			$table->string('om_key')->nullable()->index('om_key');
			$table->text('om_value')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_order_meta');
	}

}
