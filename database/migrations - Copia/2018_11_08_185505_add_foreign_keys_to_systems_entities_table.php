<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSystemsEntitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('systems_entities', function(Blueprint $table)
		{
			$table->foreign('entity_id')->references('id')->on('entities')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('system_id')->references('id')->on('systems')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('systems_entities', function(Blueprint $table)
		{
			$table->dropForeign('systems_entities_entity_id_foreign');
			$table->dropForeign('systems_entities_system_id_foreign');
		});
	}

}
