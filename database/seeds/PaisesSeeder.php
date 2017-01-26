<?php

use Illuminate\Database\Seeder;

use pruebaujaveriana\pais;
use Illuminate\Support\Facades\DB;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i = 0; $i <50; $i++){
            DB::table('pais')->insert([
                'nombre' => "Pais$i"
            ]);
       }
    }
}
