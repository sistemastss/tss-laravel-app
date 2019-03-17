<?php

use Faker\Generator as Faker;

$factory->define(App\PersonaEvaluada::class, function (Faker $faker) {
    static $i = 1;
    return [
        //
        'servicio_esp_id' => $i++,
        'nombre' => $faker->name,
        'numero_identificacion' => $faker->randomNumber(),
        'departamento' => 'cundinamarca',
        'ciudad' => $faker->city,
        'telefono' => $faker->randomNumber(),
        'email' => $faker->email,
        'observaciones' => $faker->text,
        'anexo' => 'hojaDevida.docx'
    ];
});
