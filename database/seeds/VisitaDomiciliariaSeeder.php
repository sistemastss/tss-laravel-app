<?php

use Illuminate\Database\Seeder;

class VisitaDomiciliariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();


        \App\VisitaDomiciliaria::create([
            'persona_evaluada_id' => 1
        ]);


        for ($i = 1; $i <= 4; $i++) {
            \App\VisitaDomiciliaria::create([
                'persona_evaluada_id' => $i
            ]);


            \App\VerificacionDocumental::create([
                'visita_domiciliaria_id' => $i,
                'cedula_ciudadania' => $faker->boolean,
                'libreta_militar' => $faker->boolean,
                'licencia_conduccion' => $faker->boolean,
                'tarjeta_profesional' => $faker->boolean,
                'diploma_bachiller' => $faker->boolean,
                'diploma_tecnico' => $faker->boolean,
                'diploma_tecnologo' => $faker->boolean,
                'diploma_pregrado' => $faker->boolean,
                'diploma_postgrado' => $faker->boolean,
                'diploma_cursos' => $faker->boolean,
                'observaciones' => $faker->text
            ]);
        }
    }
}
