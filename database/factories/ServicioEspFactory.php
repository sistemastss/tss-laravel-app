<?php

use Faker\Generator as Faker;

$factory->define(App\ServicioEsp::class, function (Faker $faker) {
    static $i = 0;
    return [
        'centro_costo_id' => ++$i,
        'lugar_desarrollo' => 'bogota',
    ];
});
