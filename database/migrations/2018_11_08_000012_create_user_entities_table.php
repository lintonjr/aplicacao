<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEntitiesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'user_entities';

    /**
     * Run the migrations.
     * @table user_entities
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('user_id');
            $table->unsignedInteger('entity_id');

            $table->index(["user_id"], 'user_entities_user_id_index');

            $table->index(["entity_id"], 'user_entities_entity_id_index');


            $table->foreign('entity_id', 'user_entities_entity_id_index')
                ->references('id')->on('entities')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('user_id', 'user_entities_user_id')
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
