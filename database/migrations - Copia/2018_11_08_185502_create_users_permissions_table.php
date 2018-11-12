<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_permissions', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->index();
			$table->integer('account_id')->unsigned()->index();
			$table->integer('profile_id')->unsigned()->index();
			$table->integer('module_id')->unsigned()->index();
			$table->integer('action_id')->unsigned()->index();
			$table->index(['account_id','profile_id','module_id','action_id'], 'account_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_permissions');
	}

}
