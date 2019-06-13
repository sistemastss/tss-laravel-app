<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObligacionesMoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obligaciones_mora', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("servicio_esp_id");
            $table->string("entidad");
            $table->string("tipo_credito");
            $table->string("tiempo_mora");
            $table->string("monto_mora");
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
        Schema::dropIfExists('obligaciones_mora');
    }
}
