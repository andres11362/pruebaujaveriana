<?php

use Illuminate\Database\Seeder;

use pruebaujaveriana\departamento;

class MunicipiosSeeder extends Seeder
{

    //Uso de una clase seeder esto con el objetivo de alimentar la base de datos para hacer pruebas

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departamentos = departamento::all(); //Se llama al modelo departamentos para relacionarlo con los municipios
        $contador = 0; //se usa un contador para dar nombres diferentes a los registros en la tabla

        foreach ($departamentos as $departamento){ //uso de foreach para lograr el registro de un departamento en el municipio

            $cantidad = mt_rand(0,5); //se usa una variable que toma un valor de 0 a 5

            for ($i = 0; $i < $cantidad; $i++) { //el for hace el recorrido dependiendo del valor que haya obtenido $cantidad
                $contador++;                     //se hace un incremento a $contador
                DB::table('municipios')->insert([ //se insertan los datos en la tabla municipios
                    'nombre' => "Municipio$i",    //para identificarlos a cada uno se le da el valor dependiendo del
                    'departamento_id' => $departamento->id,  //incremento de la variable $i
                ]);
            }

        }

    }
}
