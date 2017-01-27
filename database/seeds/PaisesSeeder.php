<?php

use Illuminate\Database\Seeder;

use pruebaujaveriana\pais;
use Illuminate\Support\Facades\DB;

class PaisesSeeder extends Seeder
{

    //Uso de una clase seeder esto con el objetivo de alimentar la base de datos para hacer pruebas

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i = 0; $i <50; $i++){ //el for hace el recorrido hasta 49
            DB::table('pais')->insert([  //se insertan los datos en la tabla municipios
                'nombre' => "Pais$i"     //para identificarlos a cada uno se le da el valor dependiendo del
            ]);                           //incremento de la variable $i
       }
    }
}
