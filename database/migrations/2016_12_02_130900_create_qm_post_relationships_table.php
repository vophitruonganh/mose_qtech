<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmPostRelationshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_post_relationships', function(Blueprint $table)
		{
			$table->bigInteger('post_id')->unsigned()->default(0);
			$table->bigInteger('taxonomy_id')->unsigned()->default(0)->index('term_taxonomy_id');
			$table->integer('taxonomy_order')->default(0);
			$table->primary(['post_id','taxonomy_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_post_relationships');
	}

}
