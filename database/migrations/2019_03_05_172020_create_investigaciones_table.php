<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('centro_costo_id');
            $table->string('ciudad');
            $table->text('descripcion');
            $table->string('anexo')->nullable();
            $table->string('tipo_servicio')->default('inv');
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
        Schema::dropIfExists('investigaciones');
    }
}
