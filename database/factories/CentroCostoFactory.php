<?php

use Faker\Generator as Faker;

$factory->define(App\CentroCosto::class, function (Faker $faker) {
    return [
        'usuario_id'    => $faker->numberBetween(1, 10),
        'solicitante'          => 'cristian stiven p',
        'correo_solicitante'      => 'styven21121@gmail.com',
        'active'        => 1
    ];
});
