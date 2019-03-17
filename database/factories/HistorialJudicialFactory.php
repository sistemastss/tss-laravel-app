<?php

use Faker\Generator as Faker;

$factory->define(App\HistorialJudicial::class, function (Faker $faker) {
    static $increments = 1;
    return [
        //
        'servicio_esp_id' => $increments++,
        'proceso_juridico' => $faker->boolean,
        'proceso_procuraduria' => $faker->boolean,
        'proceso_contraloria' => $faker->boolean,
        'proceso_fiscalia' => $faker->boolean,
        'proceso_policia' => $faker->boolean,
        'proceso_transito' => $faker->boolean,
        'verificacion' => $faker->boolean,
        'orden_captura_internacional' => $faker->boolean,
        'sanciones_penales' => $faker->text,
        'delito_procuraduria' => $faker->text,
        'inhabilidades_procuraduria' => $faker->text,
        'fecha_inhabilidad' => $faker->date(),
        'antecedentes_fiscales' => $faker->boolean,
        'fecha_antecedente' => $faker->date(),
        'clase_proceso' => $faker->text,
        'datos_sentencia' => $faker->text,
        'delito_judicial' => $faker->text,
        'situacion_juridica' => $faker->text,
        'f_g_n_ns' => $faker->text,
        'lista_ofac' => $faker->boolean,
        'lista_onu' => $faker->boolean,
        'vinculos_subversion' => $faker->boolean,
        'antecedentes_policia' => $faker->boolean,
        'paramilitarismo' => $faker->boolean,
        'movilidad' => $faker->text,
        'total_adeudado' => $faker->numberBetween(1231232, 43234243),
        'observaciones' => $faker->text,
    ];
});
