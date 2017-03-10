<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmTaxonomyMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_taxonomy_meta', function(Blueprint $table)
		{
			$table->bigInteger('meta_id', true)->unsigned();
			$table->bigInteger('taxonomy_id')->unsigned()->default(0);
			$table->string('meta_key')->nullable();
			$table->text('meta_value')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_taxonomy_meta');
	}

}
