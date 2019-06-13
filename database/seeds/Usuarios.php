<?php

use Illuminate\Database\Seeder;
use Modules\Usuario\Entities\Usuario;
use Modules\Usuario\Entities\Cliente;
use Faker\Factory;

class Usuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Factory::create();

        Usuario::create([
            'rol_id'            => 1,
            'nombre'            => $faker->name,
            'direccion'         => $faker->address,
            'telefono'          => $faker->randomNumber(),
            'celular'           => $faker->randomNumber(),
            'tipo_documento'    => 'cedula',
            'documento'         => $faker->randomNumber(),
            'ciudad'            => $faker->city,
            'email'             => 'user1@tss.com',
            'contrasena'        => '12345'
        ]);

        Usuario::create([
            'rol_id'            => 2,
            'nombre'            => $faker->name,
            'direccion'         => $faker->address,
            'telefono'          => $faker->randomNumber(),
            'celular'           => $faker->randomNumber(),
            'tipo_documento'    => 'cedula',
            'documento'         => $faker->randomNumber(),
            'ciudad'            => $faker->city,
            'email'             => 'user2@tss.com',
            'contrasena'        => '12345'
        ]);

        Usuario::create([
            'rol_id'            => 3,
            'nombre'            => $faker->name,
            'direccion'         => $faker->address,
            'telefono'          => $faker->randomNumber(),
            'celular'           => $faker->randomNumber(),
            'tipo_documento'    => 'cedula',
            'documento'         => $faker->randomNumber(),
            'ciudad'            => $faker->city,
            'email'             => 'user3@tss.com',
            'contrasena'        => '12345'
        ]);

        Usuario::create([
            'rol_id'            => 4,
            'nombre'            => $faker->name,
            'direccion'         => $faker->address,
            'telefono'          => $faker->randomNumber(),
            'celular'           => $faker->randomNumber(),
            'tipo_documento'    => 'cedula',
            'documento'         => $faker->randomNumber(),
            'ciudad'            => $faker->city,
            'email'             => 'user4@tss.com',
            'contrasena'        => '12345'
        ]);


        Usuario::create([
            'rol_id'            => 5,
            'nombre'            => $faker->name,
            'direccion'         => $faker->address,
            'telefono'          => $faker->randomNumber(),
            'celular'           => $faker->randomNumber(),
            'tipo_documento'    => 'cedula',
            'documento'         => $faker->randomNumber(),
            'ciudad'            => $faker->city,
            'email'             => 'user5@tss.com',
            'contrasena'        => '12345'
        ]);


        Usuario::create([
            'rol_id'            => 6,
            'nombre'            => $faker->name,
            'direccion'         => $faker->address,
            'telefono'          => $faker->randomNumber(),
            'celular'           => $faker->randomNumber(),
            'tipo_documento'    => 'cedula',
            'documento'         => $faker->randomNumber(),
            'ciudad'            => $faker->city,
            'email'             => 'user6@tss.com',
            'contrasena'        => '12345'
        ]);


        Usuario::create([
            'rol_id'            => 7,
            'nombre'            => $faker->name,
            'direccion'         => $faker->address,
            'telefono'          => $faker->randomNumber(),
            'celular'           => $faker->randomNumber(),
            'tipo_documento'    => 'cedula',
            'documento'         => $faker->randomNumber(),
            'ciudad'            => $faker->city,
            'email'             => 'user7@tss.com',
            'contrasena'        => '12345'
        ]);


        Usuario::create([
            'rol_id'            => 8,
            'nombre'            => $faker->name,
            'direccion'         => $faker->address,
            'telefono'          => $faker->randomNumber(),
            'celular'           => $faker->randomNumber(),
            'tipo_documento'    => 'cedula',
            'documento'         => $faker->randomNumber(),
            'ciudad'            => $faker->city,
            'email'             => 'user8@tss.com',
            'contrasena'        => '12345'
        ]);


        Cliente::create([
            'usuario_id'            => 6,
            'sistema_gestion'       => true,
            'documento_rep_legal'   => 123456,
            'analista_id'           => 3,
        ]);

        // factory(Usuario::class, 100)->create();
    }

}
