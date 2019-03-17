<?php

use Faker\Generator as Faker;

static $mail = [
    6 => 'cliente@tss.com',
    3 =>'analistaesp@tss.com',
    7 => 'freelance@tss.com',
];

$factory->define(App\Usuario::class, function (Faker $faker) {
    return [
        //
        'rol_id' => $faker->randomElement([3, 6, 7]),
        'nombre' => $faker->name,
        'identificacion' => $faker->numberBetween(887654332, 109823321),
        'direccion' => $faker->address,
        'mail' => $faker->email,
        'telefono' => $faker->randomNumber(),
        'contrasena' => '1234',
        'active' => true,
        'api_token' => str_random(60),
    ];
});
