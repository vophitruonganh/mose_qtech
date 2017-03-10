<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_product', function(Blueprint $table)
		{
			$table->bigInteger('product_id', true)->unsigned();
			$table->bigInteger('user_id')->unsigned()->default(0)->index('post_author');
			$table->integer('product_date')->index('post_date');
			$table->integer('product_modified');
			$table->text('product_title', 65535);
			$table->text('product_content');
			$table->text('product_excerpt', 65535);
			$table->string('product_status', 20)->default('publish')->index('post_status');
			$table->string('product_slug', 200)->nullable()->default('')->index('post_name');
			$table->text('product_image', 65535);
			$table->string('comment_status', 20)->default('open');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_product');
	}

}
