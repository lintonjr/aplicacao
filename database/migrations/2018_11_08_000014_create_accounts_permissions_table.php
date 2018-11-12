<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsPermissionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'accounts_permissions';

    /**
     * Run the migrations.
     * @table accounts_permissions
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('account_id');
            $table->unsignedInteger('profile_id');
            $table->unsignedInteger('module_id');
            $table->unsignedInteger('action_id');

            $table->index(["action_id"], 'accounts_permissions_action_id_index');

            $table->index(["account_id", "profile_id", "module_id", "action_id"], 'accounts_permissions_ibfk_1');

            $table->index(["profile_id", "module_id", "action_id"], 'profile_id');

            $table->index(["module_id"], 'accounts_permissions_module_id_index');

            $table->index(["account_id"], 'accounts_permissions_account_id_index');

            $table->index(["profile_id"], 'accounts_permissions_profile_id_index');


            $table->foreign('account_id', 'accounts_permissions_account_id_index')
                ->references('id')->on('accounts')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('profile_id', 'profile_id')
                ->references('profile_id')->on('permissions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
