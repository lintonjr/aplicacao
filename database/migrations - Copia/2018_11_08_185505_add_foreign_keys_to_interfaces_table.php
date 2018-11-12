<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToInterfacesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('interfaces', function(Blueprint $table)
		{
			$table->foreign('interface_id')->references('id')->on('interfaces')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('interfaces', function(Blueprint $table)
		{
			$table->dropForeign('interfaces_interface_id_foreign');
		});
	}

}
