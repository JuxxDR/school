<?php

use Illuminate\Database\Seeder;

class DocentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Docente::create([
            'email' => 'aaronfrank_16@hotmail.com',
            'password' => bcrypt('IRONmaiden'),
            'nombre' => 'Aaron Francisco',
            'apellidoP' => 'Gonzalez',
            'apellidoM' => 'Mejia',
            'role' => 1
        ]);

        \App\Model\Docente::create([
            'email' => 'juanfrank_16@hotmail.com',
            'password' => bcrypt('IRONmaiden'),
            'nombre' => 'Juan Francisco',
            'apellidoP' => 'Gonzalez',
            'apellidoM' => 'Mejia',
            'role' => 1
        ]);

        \App\Model\Docente::create([
            'email' => 'marcofrank_16@hotmail.com',
            'password' => bcrypt('IRONmaiden'),
            'nombre' => 'Marco Francisco',
            'apellidoP' => 'Gonzalez',
            'apellidoM' => 'Mejia',
            'role' => 1
        ]);

        \App\Model\Docente::create([
            'email' => 'admin@hotmail.com',
            'password' => bcrypt('IRONmaiden'),
            'nombre' => 'Juan Manuel',
            'apellidoP' => 'Gonzalez',
            'apellidoM' => 'Hernandez',
            'role' => 0
        ]);
    }
}
