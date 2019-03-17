<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("rol_id");
            $table->string("nombre");
            $table->bigInteger("nit")->unique();
            $table->string("direccion");
            $table->string("mail");
            $table->string('contrasena');
            $table->bigInteger("telefono");
            $table->string("pais");
            $table->string("ciudad");
            $table->boolean("active");
            $table->string("api_token", 60)->unique();
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
        Schema::dropIfExists('clientes');
    }
    
}
