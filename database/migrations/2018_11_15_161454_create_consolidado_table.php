<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsolidadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consolidado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("servicio_esp_id");
            $table->boolean("antecedentes");
            $table->text("antecedentes_obs");
            $table->boolean("poligrafia");
            $table->text("poligrafia_obs");
            $table->boolean("financiero");
            $table->text("financiero_obs");
            $table->boolean("licencia_conduccion");
            $table->bigInteger("cat");
            $table->date("vigencia");
            $table->boolean("comparendos");
            $table->text("historial");
            $table->string("firma");
            $table->boolean("conclucion");
            $table->text("observacion");
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
        Schema::dropIfExists('consolidado');
    }
}
