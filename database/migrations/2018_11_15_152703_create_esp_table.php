<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('esps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('centro_costo_id');
            $table->integer('analista');
            $table->string('lugar_desarrollo');
            $table->string('anexo')->nullable();
            $table->text('observaciones')->nullable();
            $table->string('tipo_esp')->default('basico');
            $table->string('informe')->nullable();
            $table->string('tipo_servicio')->default('esp');
            $table->string('estado')->default('proceso');
            $table->date('fecha_entrega')->nullable();
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
        Schema::dropIfExists('esps');
    }
}
