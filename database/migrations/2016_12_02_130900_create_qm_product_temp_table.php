<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmProductTempTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_product_temp', function(Blueprint $table)
		{
			$table->bigInteger('product_temp_id', true)->unsigned();
			$table->bigInteger('variant_id')->default(0)->index('variant_id');
			$table->bigInteger('product_id')->unsigned()->default(0)->index('product_id');
			$table->string('variant_name');
			$table->text('title', 65535);
			$table->string('slug', 200)->nullable()->default('');
			$table->integer('price');
			$table->integer('quantity_buy');
			$table->integer('quantity_refuned');
			$table->bigInteger('image')->unsigned()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_product_temp');
	}

}
