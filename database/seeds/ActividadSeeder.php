<?php

use Illuminate\Database\Seeder;
use App\Models\Servicio;
use App\Models\Actividad;

class ActividadSeeder extends Seeder
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

        Servicio::create([
            'codigo' => 'ESP',
            'nombre' => 'servicio ESP',
            'active' => true
        ]);

        Actividad::create([
            'codigo' => 'HJ',
            'nombre' => 'Historial judicial',
            'tiempos' => 1,
            'servicio_id' => 1,
            'active' => true
        ]);

        Actividad::create([
            'codigo' => 'VDS',
            'nombre' => 'Visita domiciliaria',
            'tiempos' => 3,
            'servicio_id' => 1,
            'active' => true
        ]);


        Actividad::create([
            'codigo' => 'VA',
            'nombre' => 'Verificación académica',
            'tiempos' => 3,
            'servicio_id' => 1,
            'active' => true
        ]);


        Actividad::create([
            'codigo' => 'VL',
            'nombre' => 'Verificación laboral',
            'tiempos' => 3,
            'servicio_id' => 1,
            'active' => true
        ]);

        Actividad::create([
            'codigo' => 'DDL',
            'nombre' => 'Due Dilligence',
            'tiempos' => 3,
            'servicio_id' => 1,
            'active' => true
        ]);

        Actividad::create([
            'codigo' => 'EF',
            'nombre' => 'Estudio financiero',
            'tiempos' => 3,
            'servicio_id' => 1,
            'active' => true
        ]);

        Actividad::create([
            'codigo' => 'PL',
            'nombre' => 'Poligrafía',
            'tiempos' => 3,
            'servicio_id' => 1,
            'active' => true
        ]);

        Actividad::create([
            'codigo' => 'DG',
            'nombre' => 'Dictamen grafológico',
            'tiempos' => 3,
            'servicio_id' => 1,
            'active' => true
        ]);

        Actividad::create([
            'codigo' => 'Dd',
            'nombre' => 'Decadactilar',
            'tiempos' => 3,
            'servicio_id' => 1,
            'active' => true
        ]);

        Actividad::create([
            'codigo' => 'PP',
            'nombre' => 'Prueba psicotécnica',
            'tiempos' => 0,
            'servicio_id' => 1,
            'active' => true
        ]);
    }
}
