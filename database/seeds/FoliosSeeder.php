<?php

use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: presa
 * Date: 21/10/2018
 * Time: 02:08 PM
 */

class FoliosSeeder extends Seeder
{
    public function run()
    {
        DB::table('folios')->insert([
            ['folio'=>'016896','fecha_inicio'=>\Carbon\Carbon::now(),'fecha_fin'=>\Carbon\Carbon::now()->addMonth()],
            ['folio'=>'016897','fecha_inicio'=>\Carbon\Carbon::now(),'fecha_fin'=>\Carbon\Carbon::now()->addMonth()],
            ['folio'=>'016898','fecha_inicio'=>\Carbon\Carbon::now(),'fecha_fin'=>\Carbon\Carbon::now()->addMonth()],
            ['folio'=>'016899','fecha_inicio'=>\Carbon\Carbon::now(),'fecha_fin'=>\Carbon\Carbon::now()->addMonth()],
            ['folio'=>'016901','fecha_inicio'=>\Carbon\Carbon::now(),'fecha_fin'=>\Carbon\Carbon::now()->addMonth()],
            ['folio'=>'016902','fecha_inicio'=>\Carbon\Carbon::now(),'fecha_fin'=>\Carbon\Carbon::now()->addMonth()]
        ]);
    }
}