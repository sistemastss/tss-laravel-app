<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosEspTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios_esp', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("servicio_id");
            $table->string("ciudad_desarrollo");
            $table->string("nombre");
            $table->bigInteger("documento");
            $table->string("departamento");
            $table->string("ciudad");
            $table->bigInteger("telefono");
            $table->string("correo");
            $table->text("descripcion");
            $table->string("anexo")->nullable();
            $table->string("estado")->default("proceso");
            $table->string("clase")->default("esp");
            $table->boolean("active")->default(true);
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
        Schema::dropIfExists('servicios_esp');
    }
}
