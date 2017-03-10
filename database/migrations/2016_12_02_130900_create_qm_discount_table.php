<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmDiscountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_discount', function(Blueprint $table)
		{
			$table->bigInteger('discount_id', true)->unsigned();
			$table->text('discount_title', 65535);
			$table->integer('discount_limit_start')->default(0);
			$table->integer('discount_limit_end')->default(0);
			$table->integer('discount_date_start')->index('discount_date_start');
			$table->integer('discount_date_end')->index('discount_date_end');
			$table->string('discount_status', 20)->default('')->index('discount_status');
			$table->integer('offer_option');
			$table->integer('promotion_allow')->default(0);
			$table->string('discount_option', 50);
			$table->integer('discount_take');
			$table->integer('discount_offer');
			$table->integer('money_over');
			$table->string('discount_type', 150)->index('discount_type');
			$table->bigInteger('relationship_id')->index('relationship_id');
			$table->text('relationship_title', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_discount');
	}

}
