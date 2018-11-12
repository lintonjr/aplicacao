<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAccountsPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('accounts_permissions', function(Blueprint $table)
		{
			$table->foreign('account_id')->references('id')->on('accounts')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('action_id', 'accounts_permissions_ibfk_1')->references('action_id')->on('permissions')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('accounts_permissions', function(Blueprint $table)
		{
			$table->dropForeign('accounts_permissions_account_id_foreign');
			$table->dropForeign('accounts_permissions_ibfk_1');
		});
	}

}
