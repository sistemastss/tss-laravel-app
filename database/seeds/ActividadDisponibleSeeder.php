<?php

use Illuminate\Database\Seeder;

class ActividadDisponibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // todo actividades de servicios esp

        // no borrar ni modificar los valores
        // se pueden agregar mas actividades
        \App\ServicioDisponible::create([
            'codigo' => 'ESP',
            'nombre' => 'servicio ESP',
            'active' => true
        ]);

        \App\ActividadDisponible::create([
            'codigo' => 'HJ',
            'nombre' => 'Historial judicial',
            'tiempos' => 1,
            'servicio_disp_codigo' => 'ESP',
            'active' => true
        ]);

        \App\ActividadDisponible::create([
            'codigo' => 'VDS',
            'nombre' => 'Visita domiciliaria',
            'tiempos' => 3,
            'servicio_disp_codigo' => 'ESP',
            'active' => true
        ]);


        \App\ActividadDisponible::create([
            'codigo' => 'VA',
            'nombre' => 'Verificación académica',
            'tiempos' => 3,
            'servicio_disp_codigo' => 'ESP',
            'active' => true
        ]);


        \App\ActividadDisponible::create([
            'codigo' => 'VL',
            'nombre' => 'Verificación laboral',
            'tiempos' => 3,
            'servicio_disp_codigo' => 'ESP',
            'active' => true
        ]);

        \App\ActividadDisponible::create([
            'codigo' => 'DDL',
            'nombre' => 'Due Dilligence',
            'tiempos' => 3,
            'servicio_disp_codigo' => 'ESP',
            'active' => true
        ]);

        \App\ActividadDisponible::create([
            'codigo' => 'EF',
            'nombre' => 'Estudio financiero',
            'tiempos' => 3,
            'servicio_disp_codigo' => 'ESP',
            'active' => true
        ]);

        \App\ActividadDisponible::create([
            'codigo' => 'PL',
            'nombre' => 'Poligrafía',
            'tiempos' => 3,
            'servicio_disp_codigo' => 'ESP',
            'active' => true
        ]);

        \App\ActividadDisponible::create([
            'codigo' => 'DG',
            'nombre' => 'Dictamen grafológico',
            'tiempos' => 3,
            'servicio_disp_codigo' => 'ESP',
            'active' => true
        ]);

        \App\ActividadDisponible::create([
            'codigo' => 'Dd',
            'nombre' => 'Decadactilar',
            'tiempos' => 3,
            'servicio_disp_codigo' => 'ESP',
            'active' => true
        ]);

        \App\ActividadDisponible::create([
            'codigo' => 'PP',
            'nombre' => 'Prueba psicotécnica',
            'tiempos' => 0,
            'servicio_disp_codigo' => 'ESP',
            'active' => true
        ]);
    }
}
