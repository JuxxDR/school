<?php

use Illuminate\Database\Seeder;

class GruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Grupo::create([
            'docente_id' => '1',
            'aula' => 'Q7',
            'grado' => 1,
        ]);

        \App\Model\Grupo::create([
            'docente_id' => '2',
            'aula' => 'Q6',
            'grado' => 3,
        ]);

        \App\Model\Grupo::create([
            'docente_id' => '3',
            'aula' => 'Q5',
            'grado' => 2,
        ]);
    }
}
