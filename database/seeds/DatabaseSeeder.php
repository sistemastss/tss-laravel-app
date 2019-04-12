<?php

use Illuminate\Database\Seeder;
use \App\ServicioEsp;
use \App\Investigacion;
use \App\Poligrafia;
use \App\CentroCosto;

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
        // $this->call(ActividadAplicadaSeeder::class);
        // $this->call(ActividadAsignadaSeeder::class);


        /*factory(\App\EvaluacionFinanciera::class, 10)->create()->each(
            function (\App\EvaluacionFinanciera $value) {
                $value->cuentasBancarias()->saveMany(factory(\App\CuentaBancaria::class, 3)->make());
                $value->obligacionesVigentes()->saveMany(factory(\App\ObligacionVigente::class, 3)->make());
                $value->obligacionesVigentesReal()->saveMany(factory(\App\ObligacionVigenteReal::class, 3)->make());

            }
        );*/



        // todo centro de costo factory
        $cantidad = 2; // controla la cantidad de centros de costo a crear

        factory(CentroCosto::class, $cantidad)->create()->each(
            function (CentroCosto $centroCosto) {
                $centroCosto->servicioEsp()->saveMany(factory(ServicioEsp::class, 2)->create());
            }
        );

        factory(CentroCosto::class, $cantidad)->create()->each(
            function (CentroCosto $centroCosto) {
                $centroCosto->investigacion()->saveMany(factory(Investigacion::class, 2)->create());
            }
        );

        factory(CentroCosto::class, $cantidad)->create()->each(
            function (CentroCosto $centroCosto) {
                $centroCosto->poligrafia()->saveMany(factory(Poligrafia::class, 2)->create());
            }
        );


        // persona evaluada
        // factory(\App\PersonaEvaluada::class, $cantidad * 2)->create();

        //historial judicial
        //factory(\App\HistorialJudicial::class, $cantidad * 2)->create();
    }
}
