<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('given_id');
            $table->string('name');
            $table->string('equipment_description');
            $table->string('user_id');
            $table->string('user_name');
            $table->string('use_description');
            $table->string('time_in');
            $table->string('time_out');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_logs');
    }
}
