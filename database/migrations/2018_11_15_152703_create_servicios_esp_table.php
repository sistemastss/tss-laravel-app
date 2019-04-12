<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosEspTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios_esp', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("centro_costo_id");
            $table->string("evaluado");
            $table->string('ciudad');
            $table->string('tipo_documento');
            $table->bigInteger("documento");
            $table->bigInteger("telefono");
            $table->string("email");
            $table->string("direccion");
            $table->text("observaciones");
            $table->string("tipo_esp");
            $table->boolean("aceptar_terminos");
            $table->string('anexo')->nullable();
            $table->string('tipo_servicio')->default('esp');
            $table->string('estado')->default("proceso");
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
        Schema::dropIfExists('servicios_esp');
    }
}
