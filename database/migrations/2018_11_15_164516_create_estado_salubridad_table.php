<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoSalubridadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_salubridad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("servicio_esp_id");
            $table->string("toma_medicamentos");
            $table->string("sufre_enfermedades");
            $table->string("tratamiento_psicologico");
            $table->boolean("fuma");
            $table->boolean("consume_alcohol");
            $table->boolean("consume_drogas");
            $table->string("realiza_deporte");
            $table->string("hobbies");
            $table->string('estado')->nullable()->default('proceso');
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
        Schema::dropIfExists('estado_salubridad');
    }
}
