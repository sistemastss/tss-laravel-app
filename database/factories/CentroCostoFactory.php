<?php

use Faker\Generator as Faker;

$factory->define(App\CentroCosto::class, function (Faker $faker) {
    return [
        'usuario_id'                => $faker->numberBetween(1, 10),
        'solicitante'               => 'cristian stiven p',
        'telefono_solicitante'      => $faker->randomNumber(),
        'email_solicitante'         => $faker->email,
        'destino_factura'           => $faker->word,
        'tipo_sociedad'             => $faker->randomElement(['natural', 'juridoco']),
        'tipo_identificacion'       => $faker->randomElement(['cedula', 'nit']),
        'numero_identificacion'     => $faker->randomNumber(),
        'telefono_factura'          => $faker->randomNumber(),
        'email_factura'             => $faker->email
    ];

});
