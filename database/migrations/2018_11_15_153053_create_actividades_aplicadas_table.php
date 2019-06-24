<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesAplicadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_aplicadas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('actividad_id');
            $table->morphs('servicio');
            $table->integer('usuario_id')->nullable();
            $table->string('estado')->default('proceso');
            $table->text('justificacion_rechazo')->nullable();
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
        Schema::dropIfExists('actividades_aplicadas');
    }
}
