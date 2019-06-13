<?php

use Illuminate\Database\Seeder;
use Modules\Usuario\Entities\Roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //todo roles de usuarios
        //no borrar no editar los roles existentes
        //se puede agregar mas roles

        //
        Roles::insert([
            [
                // 1
                'rol' => 'Administrador general',
                'codigo' => 'ADG',
                'active' => true
            ],
            [
                // 2
                'rol' => 'A. Investigaciones',
                'codigo' => 'ADI',
                'active' => true
            ],
            [
                // 3
                'rol' => 'A. E.S.P',
                'codigo' => 'AESP',
                'active' => true
            ],
            [
                // 4
                'rol' => 'A. Poligrafia',
                'codigo' => 'APOL',
                'active' => true
            ],
            [
                // 5
                'rol' => 'Analista',
                'codigo' => 'ANA',
                'active' => true
            ],
            [
                // 6
                'rol' => 'Cliente',
                'codigo' => 'CLI',
                'active' => true
            ],
            [
                // 7
                'rol' => 'Freelance',
                'codigo' => 'FRCE',
                'active' => true
            ],
            [
                // 8
                'rol' => 'Director de operaciones',
                'codigo' => 'DOPE',
                'active' => true
            ],
            [
                // 9
                'rol' => 'Poligrafista',
                'codigo' => 'POLI',
                'active' => true
            ],
            [
                // 10
                'rol' => 'Gerencia General',
                'codigo' => 'GGRL',
                'active' => true
            ],
            [
                // 11
                'rol' => 'Recursos Humanos',
                'codigo' => 'RRHH',
                'active' => true
            ],
            [
                // 12
                'rol' => 'Administrativos',
                'codigo' => 'ASAD',
                'active' => true
            ]]
        );

        //
    }
}
