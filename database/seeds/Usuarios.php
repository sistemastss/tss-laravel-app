<?php

use Illuminate\Database\Seeder;

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
        $faker = \Faker\Factory::create();


        //analista esp
        \App\Usuario::create([
            'rol_id' => 3,
            'nombre' => 'cristian esp',
            'identificacion' => "987654332",
            'direccion' => $faker->address,
            'mail' => "analistaesp@tss.com",
            'telefono' => $faker->randomNumber(),
            'contrasena' => '1234',
            'active' => true,
            'api_token' => str_random(60),
        ]);


        \App\Usuario::create([
            'rol_id' => 3,
            'nombre' => 'carlos esp',
            'identificacion' => "987653333",
            'direccion' => $faker->address,
            'mail' => "analistaespcarlos@tss.com",
            'telefono' => $faker->randomNumber(),
            'contrasena' => 'aesp1234',
            'active' => true,
            'api_token' => str_random(60),
        ]);



        \App\Usuario::create([
            'rol_id' => 3,
            'nombre' => 'andres esp',
            'identificacion' => "10265958312",
            'direccion' => $faker->address,
            'mail' => "analistaespandr@tss.com",
            'telefono' => $faker->randomNumber(),
            'contrasena' => 'aesp1234',
            'active' => true,
            'api_token' => str_random(60),
        ]);

        //administrador general

        \App\Usuario::create([
            'rol_id' => 1,
            'nombre' => 'cristian admin',
            'identificacion' => "123",
            'direccion' => $faker->address,
            'mail' => "admin@tss.com",
            'telefono' => $faker->randomNumber(),
            'contrasena' => 1234,
            'active' => true,
            'api_token' => str_random(60),
        ]);


        \App\Usuario::create([
            'rol_id' => 8,
            'nombre' => 'cristian dope',
            'identificacion' => "123433",
            'direccion' => $faker->address,
            'mail' => "dope@tss.com",
            'telefono' => $faker->randomNumber(),
            'contrasena' => 1122233,
            'active' => true,
            'api_token' => str_random(60),
        ]);


        \App\Usuario::create([
            'rol_id' => 6,
            'nombre' => 'cristian cliente',
            'identificacion' => "1234",
            'direccion' => $faker->address,
            'mail' => "cliente@tss.com",
            'telefono' => $faker->randomNumber(),
            'contrasena' => 12346,
            'active' => true,
            'api_token' => str_random(60),
        ]);


        \App\Usuario::create([
            'rol_id' => 7,
            'nombre' => 'cristian freelance',
            'identificacion' => "12331232131",
            'direccion' => $faker->address,
            'mail' => "totalsecurity@tss.com",
            'telefono' => $faker->randomNumber(),
            'contrasena' => "freelance1",
            'active' => true,
            'api_token' => str_random(60),
        ]);

        \App\Usuario::create([
            'rol_id' => 7,
            'nombre' => 'cristian 2 freelance',
            'identificacion' => "34534234",
            'direccion' => $faker->address,
            'mail' => "totalsecurity@tss.com",
            'telefono' => $faker->randomNumber(),
            'contrasena' =>"freelance2",
            'active' => true,
            'api_token' => str_random(60),
        ]);

        factory(\App\Usuario::class, 100)->create();
    }
}
