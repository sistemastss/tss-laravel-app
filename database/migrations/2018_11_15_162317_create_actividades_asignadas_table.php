<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesAsignadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_asignadas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("usuario_id");
            $table->integer("actividad_apl_id");
            $table->string('estado');
            $table->dateTime('fecha_aceptacion')->default(date('Y-m-d H:i:s', time()));
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
        Schema::dropIfExists('actividades_asignadas');
    }
}
