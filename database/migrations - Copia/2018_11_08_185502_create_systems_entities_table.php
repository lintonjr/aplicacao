<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSystemsEntitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('systems_entities', function(Blueprint $table)
		{
			$table->integer('system_id')->unsigned()->index();
			$table->integer('entity_id')->unsigned()->index();
			$table->primary(['system_id','entity_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('systems_entities');
	}

}
