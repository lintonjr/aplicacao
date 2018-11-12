<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserEntitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_entities', function(Blueprint $table)
		{
			$table->foreign('entity_id')->references('id')->on('entities')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_entities', function(Blueprint $table)
		{
			$table->dropForeign('user_entities_entity_id_foreign');
			$table->dropForeign('user_entities_user_id_foreign');
		});
	}

}
