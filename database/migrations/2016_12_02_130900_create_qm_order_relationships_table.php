<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmOrderRelationshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_order_relationships', function(Blueprint $table)
		{
			$table->bigInteger('order_id');
			$table->bigInteger('product_temp_id')->unsigned()->default(0)->index('term_taxonomy_id');
			$table->primary(['order_id','product_temp_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_order_relationships');
	}

}
