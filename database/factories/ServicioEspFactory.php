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
        'correo' => $faker->email,
        'descripcion' => $faker->text,
        'anexo' => $faker->text,
    ];
});
