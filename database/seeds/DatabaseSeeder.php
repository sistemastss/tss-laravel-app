<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(Usuarios::class);
        $this->call(ActividadDisponibleSeeder::class);
        $this->call(ActividadAplicadaSeeder::class);
        // $this->call(ActividadAsignadaSeeder::class);


        /*factory(\App\EvaluacionFinanciera::class, 10)->create()->each(
            function (\App\EvaluacionFinanciera $value) {
                $value->cuentasBancarias()->saveMany(factory(\App\CuentaBancaria::class, 3)->make());
                $value->obligacionesVigentes()->saveMany(factory(\App\ObligacionVigente::class, 3)->make());
                $value->obligacionesVigentesReal()->saveMany(factory(\App\ObligacionVigenteReal::class, 3)->make());

            }
        );*/



        // todo centro de costo factory
        $cantidad = 1; // controla la cantidad de centros de costo a crear

        factory(\App\CentroCosto::class, $cantidad)->create()->each(
            function (\App\CentroCosto $centroCosto) {
                /*
                * un centro de costo tinene n cantidad de servicios esp
                 *en este caso 2
                */
                $centroCosto->serviciosEsp()->saveMany(factory(\App\ServicioEsp::class, 2)->make());
            });

        // persona evaluada
        factory(\App\PersonaEvaluada::class, $cantidad * 2)->create();

        //historial judicial
        //factory(\App\HistorialJudicial::class, $cantidad * 2)->create();
    }
}