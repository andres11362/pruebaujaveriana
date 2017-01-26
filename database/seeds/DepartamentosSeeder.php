<?php

use Illuminate\Database\Seeder;
use pruebaujaveriana\pais;
use pruebaujaveriana\departamento;
use Illuminate\Support\Facades\DB;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paises = pais::all();
        $contador = 0;

        foreach ($paises as $pais){

            $cantidad = mt_rand(0,5);

            for ($i = 0; $i < $cantidad; $i++){
                $contador++;
                DB::table('departamentos')->insert([
                    'nombre' => "Departamento$i",
                    'pais_id' => $pais->id,
                ]);
            }
        }


    }
}
