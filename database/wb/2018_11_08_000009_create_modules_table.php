<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'modules';

    /**
     * Run the migrations.
     * @table modules
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('system_id');
            $table->unsignedInteger('interface_id');
            $table->string('name');

            $table->index(["interface_id"], 'modules_interface_id_foreign');

            $table->index(["system_id"], 'modules_system_id_foreign');
            $table->nullableTimestamps();


            $table->foreign('interface_id', 'modules_interface_id_foreign')
                ->references('id')->on('interfaces')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('system_id', 'modules_system_id_foreign')
                ->references('id')->on('systems')
                ->onDelete('restrict')
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
