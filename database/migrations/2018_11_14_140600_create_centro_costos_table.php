<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentroCostosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centro_costos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id');
            $table->string('solicitante');
            $table->bigInteger('telefono_solicitante');
            $table->string('email_solicitante');
            $table->string('destino_factura');
            $table->string('tipo_sociedad');
            $table->string('tipo_documento');
            $table->bigInteger('documento');
            $table->bigInteger('telefono_factura');
            $table->string('email_factura');
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
        Schema::dropIfExists('centro_costos');
    }
}
