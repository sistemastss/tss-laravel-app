<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModusVivendiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modus_vivendi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("servicio_esp_id");
            $table->double("salario");
            $table->double("otros_ingresos");
            $table->double("salario_conyuge");
            $table->double("egresos_mensuales");
            $table->text("descripcion_gastos");
            $table->integer("personas_dependientes");
            $table->text("analisis_patrimonial");
            $table->string('estado', 20)->nullable()->default('proceso');
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
        Schema::dropIfExists('modus_vivendi');
    }
}
