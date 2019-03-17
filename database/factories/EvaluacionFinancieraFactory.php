<?php

use Faker\Generator as Faker;



$factory->define(App\EvaluacionFinanciera::class, function (Faker $faker) {
    return [
        //
        'persona_evaluada_id' => 2,
        'resumen_endeudamiento' => $faker->title . ".docx",
        'conclusion' =>  $faker->paragraph(1),
    ];

});
