<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQmCustomerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qm_customer', function(Blueprint $table)
		{
			$table->bigInteger('customer_id', true)->unsigned();
			$table->string('customer_fullname', 50)->default('')->index('customer_fullname');
			$table->string('customer_phone', 20)->default('')->index('customer_phone');
			$table->string('customer_email', 100)->default('')->index('customer_email');
			$table->integer('email_advertising')->default(0);
			$table->string('customer_pass', 100)->default('');
			$table->text('customer_address', 65535);
			$table->integer('customer_province')->default(0)->index('customer_province');
			$table->integer('customer_district')->default(0)->index('customer_district');
			$table->integer('customer_gender')->default(0);
			$table->text('customer_notes', 65535);
			$table->integer('customer_status')->nullable()->default(0)->index('customer_status');
			$table->integer('customer_level')->default(0)->index('customer_level');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qm_customer');
	}

}
