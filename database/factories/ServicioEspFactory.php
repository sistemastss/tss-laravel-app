<?php

use Faker\Generator as Faker;

$factory->define(App\ServicioEsp::class, function (Faker $faker) {
    static $i = 0;
    return [
        'centro_costo_id' => ++$i,
        'evaluado' => $faker->name,
        'tipo_documento' => 'cc',
        'documento' => $faker->randomNumber(),
        'telefono' => $faker->randomNumber(),
        'email' => $faker->email,
        'ciudad' => $faker->randomElement(['Bogota', 'Cali', 'Medellin']),
        'direccion' => $faker->address,
        'observaciones' => $faker->text,
        'tipo_esp' => $faker->randomElement(['basico', 'integral', 'avanzado']),
        'aceptar_terminos' => true,
        'anexo' => $faker->word,
    ];
});
