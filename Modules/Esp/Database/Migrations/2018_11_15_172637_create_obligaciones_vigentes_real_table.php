<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObligacionesVigentesRealTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obligaciones_vigentes_real', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("servicio_esp_id");
            $table->string("entidad");
            $table->string("linea_credito");
            $table->date("fecha_apertura");
            $table->double("valor_cargo_fijo");
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
        Schema::dropIfExists('obligaciones_vigentes_real');
    }
}
