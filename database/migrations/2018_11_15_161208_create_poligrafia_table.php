<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoligrafiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poligrafia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("centro_costo_id");
            $table->string("evaluado");
            $table->bigInteger("documento");
            $table->string('tipo_documento');
            $table->string("departamento");
            $table->string('ciudad');
            $table->bigInteger("telefono");
            $table->string("email");
            $table->text("contexto");
            $table->string("tipo_poligrafia");
            $table->string('anexo')->nullable();
            $table->string('tipo_servicio')->default('pol');
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
        Schema::dropIfExists('poligrafia');
    }
}
