<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacionFamiliarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion_familiar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("servicio_esp_id");
            $table->string("nombre");
            $table->integer("edad");
            $table->string("ocupacion");
            $table->bigInteger("telefono");
            $table->string("ciudad");
            $table->string("parentesco");
            $table->boolean("vive_con_ud");
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
        Schema::dropIfExists('informacion_familiar');
    }
}
