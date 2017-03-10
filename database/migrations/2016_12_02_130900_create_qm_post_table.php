<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmPostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_post', function(Blueprint $table)
		{
			$table->bigInteger('post_id', true)->unsigned();
			$table->bigInteger('user_id')->unsigned()->default(0)->index('post_author');
			$table->integer('post_date')->index('post_date');
			$table->integer('post_modified');
			$table->text('post_title', 65535);
			$table->text('post_content');
			$table->text('post_excerpt', 65535);
			$table->string('post_status', 20)->default('publish')->index('post_status');
			$table->string('post_slug', 200)->nullable()->default('')->index('post_name');
			$table->bigInteger('post_parent')->unsigned()->default(0)->index('post_parent');
			$table->bigInteger('post_image')->nullable()->default(0);
			$table->string('comment_status', 20);
			$table->string('post_type', 20)->default('post')->index('post_type');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_post');
	}

}
