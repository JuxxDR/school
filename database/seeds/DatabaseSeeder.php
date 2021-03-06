<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FoliosSeeder::class);
        $this->call(DocentesTableSeeder::class);
        //$this->call(GruposTableSeeder::class);
    }
}
