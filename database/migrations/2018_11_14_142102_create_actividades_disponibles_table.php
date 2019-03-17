<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesDisponiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_disponibles', function (Blueprint $table) {
            $table->string("codigo");
            $table->string("nombre");
            $table->integer("tiempos");
            $table->string("servicio_disp_codigo");
            $table->boolean("active");
            $table->timestamps();
        });

        Schema::table('actividades_disponibles', function (Blueprint $table) {
            $table->primary("codigo");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades_disponibles');
    }
}
