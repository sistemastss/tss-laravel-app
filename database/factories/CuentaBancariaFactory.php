<?php

use Faker\Generator as Faker;

$factory->define(App\CuentaBancaria::class, function (Faker $faker) {
    return [
        'tipo_cuenta' => $faker->numberBetween(10, 11),
        'entidad' => $faker->randomElement(['bancolombia', 'banco av villas', 'occidente']),
        'ciudad' => 'bogota',
        'fecha_apertura' => $faker->date(),
        'estado' => 'ok',
    ];
});
