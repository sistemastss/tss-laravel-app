<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosInformeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_informe', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("consolidado_id");
            $table->boolean("encabezado");
            $table->boolean("foto_evaluado");
            $table->boolean("logo_cliente");
            $table->boolean("nucleo_familiar");
            $table->boolean("verficacion_va");
            $table->boolean("verficacion_vl");
            $table->boolean("referencias_bancarias");
            $table->boolean("capacidad_endeudamiento");
            $table->boolean("estudio_financiero");
            $table->boolean("historial_judicial");
            $table->boolean("evaluacion_seguridad");
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
        Schema::dropIfExists('datos_informe');
    }
}
