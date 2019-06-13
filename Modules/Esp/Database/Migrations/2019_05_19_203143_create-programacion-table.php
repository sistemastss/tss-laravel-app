<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programacion', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('visita_domiciliaria_id');
           $table->string('fecha');
           $table->string('hora');
           $table->string('justificacion_reprog');
           $table->date('fecha_reprog');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programacion');
    }
}
