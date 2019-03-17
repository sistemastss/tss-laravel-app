<?php

use Illuminate\Database\Seeder;

class ActividadAsignadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cantidad = 4;
        factory(\App\ActividadAsignada::class, $cantidad)->create();

    }
}
