<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_user', function(Blueprint $table)
		{
			$table->bigInteger('user_id', true)->unsigned();
			$table->string('user_fullname', 50)->default('')->index('user_nicename');
			$table->string('user_phone', 20)->default('')->index('user_telephone');
			$table->string('user_email', 100)->default('')->index('user_email');
			$table->integer('user_notify')->default(0);
			$table->string('user_pass')->default('');
			$table->text('user_address', 65535);
			$table->integer('user_province')->default(0)->index('user_province');
			$table->integer('user_district')->default(0)->index('user_district');
			$table->integer('user_gender')->default(0);
			$table->text('user_notes', 65535);
			$table->integer('user_status')->default(0)->index('user_status');
			$table->string('user_level')->index('user_level');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_user');
	}

}
