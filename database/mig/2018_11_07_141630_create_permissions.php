<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->integer('profile_id')->unsigned()->index();
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');

            $table->integer('module_id')->unsigned()->index();
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');

            $table->integer('action_id')->unsigned()->index();
            $table->foreign('action_id')->references('id')->on('actions')->onDelete('cascade');

            $table->primary(['profile_id', 'module_id', 'action_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function(Blueprint $table)
        {
            $table->dropForeign(['permissions_profile_id_foreign',
                                'permissions_module_id_foreign',
                                'permissions_action_id_foreign']);
            $table->dropColumn('profile_id');
            // $table->dropForeign('permissions_module_id_foreign');
            $table->dropColumn('module_id');
            $table->dropForeign('action_id');
            // $table->dropColumn('permissions_action_id_foreign');
            $table->dropIfExists('permissions');
        });
    }
}
