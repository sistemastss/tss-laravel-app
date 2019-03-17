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
            $table->integer("rol_id");
            $table->bigInteger("identificacion")->unique();
            $table->string("nombre");
            $table->string("direccion");
            $table->string("mail");
            $table->bigInteger("telefono");
            $table->string('contrasena');
            $table->boolean("active");
            $table->string('api_token', 60)->nullable()->unique();
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
