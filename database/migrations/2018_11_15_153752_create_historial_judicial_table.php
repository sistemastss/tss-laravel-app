<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialJudicialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_judicial', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("servicio_esp_id");
            $table->boolean("proceso_juridico");
            $table->boolean("proceso_procuraduria");
            $table->boolean("proceso_contraloria");
            $table->boolean("proceso_fiscalia");
            $table->boolean("proceso_policia");
            $table->boolean("proceso_transito");
            $table->boolean("verificacion");
            $table->boolean("orden_captura_internacional");
            $table->text("sanciones_penales");
            $table->text("delito_procuraduria");
            $table->text("inhabilidades_procuraduria");
            $table->date("fecha_inhabilidad");
            $table->boolean("antecedentes_fiscales");
            $table->date("fecha_antecedente");
            $table->text("clase_proceso");
            $table->text("datos_sentencia");
            $table->text("delito_judicial");
            $table->text("situacion_juridica");
            $table->text("f_g_n_ns");
            $table->boolean("lista_ofac");
            $table->boolean("lista_onu");
            $table->boolean("vinculos_subversion");
            $table->boolean("antecedentes_policia");
            $table->boolean("paramilitarismo");
            $table->text("movilidad");
            $table->double("total_adeudado");
            $table->text("observaciones");
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
        Schema::dropIfExists('historial_judicial');
    }
}
