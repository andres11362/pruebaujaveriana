<?php

use Illuminate\Database\Seeder;

use pruebaujaveriana\departamento;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departamentos = departamento::all();
        $contador = 0;

        foreach ($departamentos as $departamento){

            $cantidad = mt_rand(0,5);

            for ($i = 0; $i < $cantidad; $i++) {
                $contador++;
                DB::table('municipios')->insert([
                    'nombre' => "Municipio$i",
                    'departamento_id' => $departamento->id,
                ]);
            }

        }

    }
}
