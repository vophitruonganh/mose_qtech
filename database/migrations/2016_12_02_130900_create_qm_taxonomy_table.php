<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmTaxonomyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_taxonomy', function(Blueprint $table)
		{
			$table->bigInteger('taxonomy_id', true)->unsigned();
			$table->string('taxonomy_name', 200)->index('term_id');
			$table->bigInteger('taxonomy_parent')->unsigned()->default(0);
			$table->bigInteger('taxonomy_count')->default(0);
			$table->string('taxonomy_slug', 200)->nullable();
			$table->text('taxonomy_excerpt', 65535);
			$table->string('taxonomy_type', 200)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_taxonomy');
	}

}
