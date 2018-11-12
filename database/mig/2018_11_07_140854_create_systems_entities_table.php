<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemsEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems_entities', function (Blueprint $table) {
            $table->integer('system_id')->unsigned()->index();
            $table->foreign('system_id')->references('id')->on('systems')->onDelete('cascade');

            $table->integer('entity_id')->unsigned()->index();
            $table->foreign('entity_id')->references('id')->on('entities')->onDelete('cascade');

            $table->primary(['system_id', 'entity_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles_modules_actions', function(Blueprint $table)
        {
            $table->dropForeign('system_id');
            $table->dropColumn('system_id');
            $table->dropForeign('entity_id');
            $table->dropColumn('entity_id');
            $table->dropIfExists('profiles_modules_actions');
        });
    }
}
