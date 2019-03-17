<?php

use Faker\Generator as Faker;

$factory->define(App\ObligacionVigenteReal::class, function (Faker $faker) {
    return [
        'entidad' => $faker->title,
        'linea_credito' => $faker->creditCardType,
        'fecha_apertura' => $faker->dateTime,
        'valor_cargo_fijo' => $faker->numberBetween(1222332, 123123123),
    ];
});
