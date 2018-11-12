<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersPermissionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'users_permissions';

    /**
     * Run the migrations.
     * @table users_permissions
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('account_id');
            $table->unsignedInteger('profile_id');
            $table->unsignedInteger('module_id');
            $table->unsignedInteger('action_id');

            $table->index(["account_id", "profile_id", "module_id", "action_id"], 'account_id');

            $table->index(["profile_id"], 'users_permissions_profile_id_index');

            $table->index(["module_id"], 'users_permissions_module_id_index');

            $table->index(["account_id"], 'users_permissions_account_id_index');

            $table->index(["user_id"], 'users_permissions_user_id_index');

            $table->index(["action_id"], 'users_permissions_action_id_index');


            $table->foreign('account_id', 'account_id')
                ->references('account_id')->on('accounts_permissions')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id', 'users_permissions_user_id_index')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
