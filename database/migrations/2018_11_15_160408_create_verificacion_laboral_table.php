<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerificacionLaboralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verificacion_laboral', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("servicio_esp_id");
            $table->string("empresa");
            $table->string("cargo");
            $table->bigInteger("telefono");
            $table->string("periodo");
            $table->string("jefe_inmediato");
            $table->string("cargo_jefe");
            $table->string("ciudad");
            $table->string("motivo_retiro");
            $table->boolean("confirmacion");
            $table->text("observaciones");
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
        Schema::dropIfExists('verificacion_laboral');
    }
}
