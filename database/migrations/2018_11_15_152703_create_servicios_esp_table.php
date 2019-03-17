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
            $table->integer("centro_costo_id");
            $table->string("ciudad_desarrollo");
            $table->string("nombre");
            $table->bigInteger("documento");
            $table->string("departamento");
            $table->string("ciudad");
            $table->bigInteger("telefono");
            $table->string("email");
            $table->text("observaciones");
            $table->string("anexo")->nullable();
            $table->string("estado")->default("cargado");
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
