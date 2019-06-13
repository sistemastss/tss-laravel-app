<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluados', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('servicio');
            $table->string('evaluado');
            $table->string('cargo');
            $table->string('tipo_documento');
            $table->bigInteger('documento');
            $table->bigInteger('telefono');
            $table->string('email');
            $table->string('direccion');
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
        Schema::dropIfExists('evaluados');
    }
}
