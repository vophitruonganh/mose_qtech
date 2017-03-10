<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmAttachmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_attachment', function(Blueprint $table)
		{
			$table->bigInteger('attachment_id', true)->unsigned();
			$table->bigInteger('user_id')->unsigned()->default(0)->index('user_id');
			$table->text('attachment_title', 65535);
			$table->string('attachment_url');
			$table->text('attachment_content');
			$table->string('attachment_date');
			$table->string('attachment_name', 200)->index('attachment_name');
			$table->string('attachment_type', 20)->index('attachment_type');
			$table->string('attachment_mime_type', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_attachment');
	}

}
