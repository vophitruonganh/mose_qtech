<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmCustomerRelationshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_customer_relationships', function(Blueprint $table)
		{
			$table->string('customer_id', 200)->default('0');
			$table->bigInteger('taxonomy_id')->unsigned()->default(0);
			$table->integer('customer_order')->default(0);
			$table->primary(['customer_id','taxonomy_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_customer_relationships');
	}

}
