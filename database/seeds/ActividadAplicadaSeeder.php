<?php

use Illuminate\Database\Seeder;

class ActividadAplicadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cantidad = 1;

        for ($i = 1; $i <= $cantidad; $i ++) {

            \App\ActividadAplicada::create([
                'actividad_codigo' => 'HJ',
                'servicio_id' => $i,
                'estado' => 'cargado'
            ]);

            \App\ActividadAplicada::create([
                'actividad_codigo' => 'VDS',
                'servicio_id' => $i,
                'estado' => 'cargado'
            ]);

            \App\ActividadAplicada::create([
                'actividad_codigo' => 'VA',
                'servicio_id' => $i,
                'estado' => 'cargado'
            ]);

            \App\ActividadAplicada::create([
                'actividad_codigo' => 'VL',
                'servicio_id' => $i,
                'estado' => 'cargado'
            ]);
        }



        for ($i = 2; $i <= 2; $i ++) {

            \App\ActividadAplicada::create([
                'actividad_codigo' => 'VDS',
                'servicio_id' => $i,
                'estado' => 'cargado'
            ]);

            \App\ActividadAplicada::create([
                'actividad_codigo' => 'VA',
                'servicio_id' => $i,
                'estado' => 'cargado'
            ]);
        }

        /**
         * para esp de prueba
         */

    }
}
