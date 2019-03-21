<?php

use Faker\Generator as Faker;




$factory->define(App\Servicio::class, function (Faker $faker) {
    static $i = 0;
    return [
        'centro_costo_id' => ++$i,
        'anexo' => $faker->word,
        'descripcion' => $faker->text,
        'clase' => $faker->randomElement(['esp', 'inv', 'pol']),
        'estado' => 'proceso',
    ];
});
