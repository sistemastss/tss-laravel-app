<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntornoHabitacionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entorno_habitacional', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("servicio_esp_id");
            $table->string("tipo_vivienda");
            $table->string("tenencia");
            $table->string("tiempo_permanencia");
            $table->string("propietario");
            $table->string('fotografia');

            //condiciones immueble
            $table->string("estado_general");
            $table->string("acabados");
            $table->string("dotacion");
            $table->string("salubridad");
            $table->integer("estrato");
            $table->text("servicios_publicos");
            $table->text("distribucion_vivienda");

            //condiciones sector
            $table->string("ciudad");
            $table->string("barrio");
            $table->string("localidad");
            $table->text("vias_acceso");
            $table->text("transporte_publico");
            $table->text("centros_asistenciales");
            $table->string("flujo_vehicular");
            $table->string("nivel_seguridad");

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
        Schema::dropIfExists('entorno_habitacional');
    }
}
