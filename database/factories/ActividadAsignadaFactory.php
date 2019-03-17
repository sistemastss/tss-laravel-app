<?php

use Faker\Generator as Faker;

$factory->define(App\ActividadAsignada::class, function (Faker $faker) {

    $freelance = \App\Usuario::where('rol_id', 5)->orWhere('rol_id', 7)->get()->random(1);

    static $increments = 1;


    return [
        //
        //'usuario_id' => $freelance[0]->id,
        'usuario_id' => 8,
        'actividad_apl_id' => $increments++,
        'estado' => 'cargado',
        'fecha_aceptacion' => $faker->dateTime
    ];
});
