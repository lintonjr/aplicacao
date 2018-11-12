<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountsPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounts_permissions', function(Blueprint $table)
		{
			$table->integer('account_id')->unsigned()->index();
			$table->integer('profile_id')->unsigned()->index();
			$table->integer('module_id')->unsigned()->index();
			$table->integer('action_id')->unsigned()->index();
			$table->index(['account_id','profile_id','module_id','action_id'], 'accounts_permissions_ibfk_1');
			$table->index(['profile_id','module_id','action_id'], 'profile_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('accounts_permissions');
	}

}
