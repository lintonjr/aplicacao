<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'permissions';

    /**
     * Run the migrations.
     * @table permissions
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('profile_id');
            $table->unsignedInteger('module_id');
            $table->unsignedInteger('action_id');

            $table->index(["action_id"], 'permissions_action_id_index');

            $table->index(["profile_id"], 'permissions_profile_id_index');

            $table->index(["module_id"], 'permissions_module_id_index');


            $table->foreign('action_id', 'permissions_action_id_index')
                ->references('id')->on('actions')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('module_id', 'permissions_module_id_index')
                ->references('id')->on('modules')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('profile_id', 'permissions_profile_id')
                ->references('id')->on('profiles')
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
