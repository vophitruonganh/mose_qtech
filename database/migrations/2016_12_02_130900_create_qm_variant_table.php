<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmVariantTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_variant', function(Blueprint $table)
		{
			$table->bigInteger('variant_id', true)->unsigned();
			$table->bigInteger('product_id')->index('product_id');
			$table->string('sku');
			$table->integer('price_old');
			$table->integer('price_new')->index('price_new');
			$table->integer('weight')->default(0);
			$table->string('barcode');
			$table->integer('tracking_policy')->default(0);
			$table->integer('out_of_stock')->default(0);
			$table->integer('quantity');
			$table->integer('inventory');
			$table->integer('ship')->default(0);
			$table->bigInteger('image');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_variant');
	}

}
