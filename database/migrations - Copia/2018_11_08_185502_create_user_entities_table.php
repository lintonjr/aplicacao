<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserEntitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_entities', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->index();
			$table->integer('entity_id')->unsigned()->index();
			$table->primary(['user_id','entity_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_entities');
	}

}
