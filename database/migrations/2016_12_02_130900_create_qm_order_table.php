<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_order', function(Blueprint $table)
		{
			$table->bigInteger('order_id', true)->unsigned();
			$table->bigInteger('order_code')->unsigned()->index('order_code');
			$table->bigInteger('user_id')->unsigned()->default(0)->index('user_id');
			$table->bigInteger('shipping_id')->unsigned()->default(0);
			$table->bigInteger('customer_id')->unsigned()->default(0)->index('customer_id');
			$table->string('customer_fullname', 50)->default('');
			$table->text('order_content', 65535);
			$table->integer('order_discount');
			$table->string('order_discount_notes')->default('');
			$table->integer('order_weight')->default(0);
			$table->integer('amount_order')->nullable();
			$table->integer('amount_payment')->nullable();
			$table->integer('amount_refuned')->nullable();
			$table->integer('amount_discount')->nullable();
			$table->string('amount_discount_notes')->default('');
			$table->integer('amount_ship')->nullable();
			$table->integer('date_create')->index('order_date');
			$table->integer('date_payment');
			$table->string('order_ems', 250);
			$table->string('order_payment', 200);
			$table->string('order_ship', 200);
			$table->integer('order_status');
			$table->integer('order_active')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_order');
	}

}
