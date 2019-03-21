<?php

use Faker\Generator as Faker;

$factory->define(App\CentroCosto::class, function (Faker $faker) {
    return [
        'usuario_id'    => $faker->numberBetween(1, 10),
        'solicitante'          => 'cristian stiven p',
        'email'          => $faker->email,
        'telefono'          => $faker->randomNumber(),
        'active'        => 1
    ];

});
