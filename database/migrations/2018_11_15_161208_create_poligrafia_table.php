<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoligrafiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poligrafia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("persona_evaluada_id");
            $table->string("tipo_prueba");
            $table->string("cargo_aplica");
            $table->string("adjunto");
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
        Schema::dropIfExists('poligrafia');
    }
}
