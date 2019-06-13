<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rol_id');
            $table->string('nombre');
            $table->string('direccion');
            $table->bigInteger('telefono');
            $table->bigInteger('celular');
            $table->string('tipo_documento');
            $table->bigInteger('documento')->unique();;
            $table->string('ciudad');
            $table->string('email');
            $table->string('contrasena');
            $table->string('api_token', 60)->nullable()->unique();
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('usuarios');
    }
}
