<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerificacionDocumentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verificacion_documental', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("servicio_esp_id");
            $table->boolean("cedula_ciudadania");
            $table->boolean("libreta_militar");
            $table->boolean("licencia_conduccion");
            $table->boolean("tarjeta_profesional");
            $table->boolean("diploma_bachiller");
            $table->boolean("diploma_tecnico");
            $table->boolean("diploma_tecnologo");
            $table->boolean("diploma_pregrado");
            $table->boolean("diploma_postgrado");
            $table->boolean("diploma_cursos");
            $table->text("observaciones");
            $table->string('estado')->nullable()->default('proceso');
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
        Schema::dropIfExists('verificacion_documental');
    }
}
