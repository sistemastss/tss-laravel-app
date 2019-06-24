<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitaDomiciliariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visita_domiciliaria', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('esp_id');
            $table->integer('freelance_id');
            $table->string('estado')->nullable();
            $table->text('justificacion_rechazo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visita_domiciliaria');
    }
}
