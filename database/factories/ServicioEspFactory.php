<?php

use Faker\Generator as Faker;

$factory->define(App\ServicioEsp::class, function (Faker $faker) {
    return [
        'ciudad_desarrollo' => $faker->city,
        'nombre' => $faker->name,
        'documento' => $faker->randomNumber(),
        'departamento' => $faker->word,
        'ciudad' => $faker->city,
        'telefono' => $faker->randomNumber(),
        'email' => $faker->email,
        'observaciones' => $faker->text,
        'anexo' => $faker->text,
        'estado' => 'cargado',
    ];
});
