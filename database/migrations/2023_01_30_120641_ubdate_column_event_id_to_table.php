<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            //
            $table->dropForeign('events_object_id_foreign');
            $table->dropForeign('objects_location_id_foreign');
            $table->dropForeign('objects_project_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('objects', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('event_id')->change();
            $table->unsignedBigInteger('location_id')->change();
            $table->unsignedBigInteger('project_id')->change();
        });
    }
};
