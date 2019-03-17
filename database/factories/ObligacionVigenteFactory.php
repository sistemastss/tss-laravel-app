<?php

use Faker\Generator as Faker;

$factory->define(App\ObligacionVigente::class, function (Faker $faker){

    return [
        //
        'entidad' => $faker->numberBetween(5, 10),
        'tipo_credito' =>$faker->text,
        'valor_aprobado' => $faker->randomNumber(),
        'saldo_actual' =>$faker->randomNumber(),
        'valor_cuota' => $faker->randomNumber(),
    ];
});

