<?php

use Illuminate\Database\Seeder;
use pruebaujaveriana\pais;
use pruebaujaveriana\departamento;
use Illuminate\Support\Facades\DB;

class DepartamentosSeeder extends Seeder
{

    //Uso de una clase seeder esto con el objetivo de alimentar la base de datos para hacer pruebas

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paises = pais::all();  //Se llama al modelo pais para relacionarlo con los departamentos
        $contador = 0; //se usa un contador para dar nombres diferentes a los registros en la tabla

        foreach ($paises as $pais){ //uso de foreach para lograr el registro de un pais en el departamento

            $cantidad = mt_rand(0,5); //se usa una variable que toma un valor de 0 a 5

            for ($i = 0; $i < $cantidad; $i++){ //el for hace el recorrido dependiendo del valor que haya obtenido $cantidad
                $contador++;                    //se hace un incremento a $contador
                DB::table('departamentos')->insert([         //se insertan los datos en la tabla departamentos
                    'nombre' => "Departamento$i",           //para identificarlos a cada uno se le da el valor dependiendo del
                    'pais_id' => $pais->id,                //incremento de la variable $i
                ]);
            }
        }


    }
}
