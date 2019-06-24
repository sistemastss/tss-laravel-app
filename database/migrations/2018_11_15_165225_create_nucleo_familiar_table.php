<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNucleoFamiliarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nucleo_familiar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("servicio_esp_id");
            $table->string("nombre");
            $table->integer("edad");
            $table->bigInteger("numero_identificacion");
            $table->string("lugar_expedicion");
            $table->string("lugar_nacimiento");
            $table->date("fecha_nacimiento");
            $table->string("ocupacion");
            $table->string("empresa");
            $table->bigInteger("telefono");
            $table->string("tiempo_laborado");
            $table->string("fotografia")->nullable();
            $table->text("observaciones");
            $table->string('estado', 20)->nullable()->default('proceso');
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
        Schema::dropIfExists('nucleo_familiar');
    }
}
