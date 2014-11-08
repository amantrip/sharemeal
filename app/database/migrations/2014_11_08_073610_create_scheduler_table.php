<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scheduler', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('uid');
            $table->string('rid');
            $table->string('rname');
            $table->string('raddress');
            $table->string('rurl');
            $table->timestamps();
            $table->rememberToken();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema:: drop('scheduler');
	}

}
