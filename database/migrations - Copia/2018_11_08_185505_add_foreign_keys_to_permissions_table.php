<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('permissions', function(Blueprint $table)
		{
			$table->foreign('action_id')->references('id')->on('actions')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('module_id')->references('id')->on('modules')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('profile_id')->references('id')->on('profiles')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('permissions', function(Blueprint $table)
		{
			$table->dropForeign('permissions_action_id_foreign');
			$table->dropForeign('permissions_module_id_foreign');
			$table->dropForeign('permissions_profile_id_foreign');
		});
	}

}
