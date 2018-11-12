<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('modules', function(Blueprint $table)
		{
			$table->foreign('interface_id')->references('id')->on('interfaces')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('system_id')->references('id')->on('systems')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('modules', function(Blueprint $table)
		{
			$table->dropForeign('modules_interface_id_foreign');
			$table->dropForeign('modules_system_id_foreign');
		});
	}

}
