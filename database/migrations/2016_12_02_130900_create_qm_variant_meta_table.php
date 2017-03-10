<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmVariantMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_variant_meta', function(Blueprint $table)
		{
			$table->bigInteger('meta_id', true)->unsigned();
			$table->bigInteger('variant_id')->default(0)->index('variant_id');
			$table->string('variant_name');
			$table->string('variant_value');
			$table->integer('variant_order')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_variant_meta');
	}

}
