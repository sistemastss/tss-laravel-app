<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasEvaluadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_evaluadas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("servicio_esp_id");
            $table->string("nombre");
            $table->bigInteger("numero_identificacion");
            $table->string("departamento");
            $table->string("ciudad");
            $table->bigInteger("telefono");
            $table->string("email");
            $table->text("observaciones");
            $table->string("anexo");
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
        Schema::dropIfExists('personas_evaluadas');
    }
}
