<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmShippingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_shipping', function(Blueprint $table)
		{
			$table->bigInteger('shipping_id', true)->unsigned();
			$table->bigInteger('place')->unsigned()->default(0)->index('provinces');
			$table->string('name')->default('');
			$table->integer('price')->nullable();
			$table->string('type', 100)->default('');
			$table->integer('rate_from')->default(0);
			$table->integer('rate_to')->nullable()->default(0);
			$table->bigInteger('parent')->unsigned()->default(0)->index('parent');
			$table->integer('status')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_shipping');
	}

}
