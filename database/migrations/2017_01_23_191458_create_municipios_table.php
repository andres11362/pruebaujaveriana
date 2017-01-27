<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipiosTable extends Migration
{

    //migracion de la tabla municipio, el objetivo es establecer las caracteristicas del modelo que va a ir
    //ligadas a la base de datos

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) { //declaramos el esquema ademas de darle nombre a la tabla que existira en la BD
            $table->increments('id'); //especificamos un id que usara AUTO_INCREMENT
            $table->string('nombre'); //especificamos el nombre como atributo en la tabla, esto se traducira como una variable de tipo varchar en la BD
            //$table->timestamps(); deshabilitamos los timestamps, ademas de hacer en el modelo.
            $table->integer('departamento_id')->unsigned(); //declaramos un atributo de tipo integer, que no va ser nunca negativo
            $table->foreign('departamento_id')->references('id')->on('departamentos'); //el atributo departamento_id se relaciona a una llave foranea especificamente con el id del modelo departamento
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('municipios');//en caso de realizar un rollback se borrara la tabla de la BD
    }
}
