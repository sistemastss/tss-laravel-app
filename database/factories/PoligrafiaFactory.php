<?php

use Faker\Generator as Faker;

$factory->define(App\Poligrafia::class, function (Faker $faker) {
    static $i = 0;
    return [
        'centro_costo_id' => ++$i,
        'evaluado' => $faker->name,
        'documento' => $faker->randomNumber(),
        'tipo_documento' => 'cc',
        'departamento' => $faker->randomElement(['Cundinamarca', 'Cauca', 'Antioquia']),
        'ciudad' => $faker->randomElement(['Bogota', 'Cali', 'Medellin']),
        'telefono' => $faker->randomNumber(),
        'email' => $faker->email,
        'contexto' => $faker->text,
        'anexo' => $faker->word,
        'tipo_poligrafia' => $faker->randomElement(['pre-empleo', 'rutina', 'especifico']),
    ];
});
