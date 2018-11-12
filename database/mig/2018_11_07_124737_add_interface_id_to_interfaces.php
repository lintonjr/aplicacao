<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInterfaceIdToInterfaces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interfaces', function (Blueprint $table) {
            $table->integer('interface_id')->unsigned()->after('id')->nullable();
            $table->foreign('interface_id')->references('id')->on('interfaces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interfaces', function (Blueprint $table) {
            $table->dropForeign('interfaces_interface_id_foreign');
            $table->dropColumn('interface_id');
        });
    }
}
