<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users_permissions', function(Blueprint $table)
		{
			$table->foreign('account_id', 'users_permissions_ibfk_1')->references('account_id')->on('accounts_permissions')->onUpdate('CASCADE')->onDelete('CASCADE');
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
		Schema::table('users_permissions', function(Blueprint $table)
		{
			$table->dropForeign('users_permissions_ibfk_1');
			$table->dropForeign('users_permissions_user_id_foreign');
		});
	}

}
