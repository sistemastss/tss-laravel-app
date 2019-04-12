<?php

use Faker\Generator as Faker;

$factory->define(App\Investigacion::class, function (Faker $faker) {
    static $i = 0;
    return [
        'centro_costo_id' => ++$i,
        'ciudad' => $faker->randomElement(['Bogota', 'Cali', 'Medellin']),
        'anexo' => $faker->word,
        'descripcion' => $faker->text
    ];
});
