<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('match_history', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('uid');
            $table->integer('matched_id');
            $table->string('restaurant_id');
            $table->enum('ban', ['yes', 'no'])->default('no');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('match_history');
	}

}
