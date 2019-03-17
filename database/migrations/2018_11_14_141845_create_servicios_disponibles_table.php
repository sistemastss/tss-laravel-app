<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosDisponiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios_disponibles', function (Blueprint $table) {
            $table->string("codigo");
            $table->string("nombre");
            $table->boolean("active");
            $table->timestamps();
        });

        Schema::table('servicios_disponibles', function (Blueprint $table) {
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
        Schema::dropIfExists('servicios_disponibles');
    }
}
