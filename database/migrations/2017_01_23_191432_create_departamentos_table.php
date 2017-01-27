<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentosTable extends Migration
{

    //migracion de la tabla departamentos, el objetivo es establecer las caracteristicas del modelo que va a ir
    //ligadas a la base de datos
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) { //declaramos el esquema ademas de darle nombre a la tabla que existira en la BD
            $table->increments('id'); //especificamos un id que usara AUTO_INCREMENT
            $table->string('nombre');  //especificamos el nombre como atributo en la tabla, esto se traducira como una variable de tipo varcher en la BD
            //$table->timestamps(); deshabilitamos los timestamps, ademas de hacer en el modelo.
            $table->integer('pais_id')->unsigned(); //declaramos un atributo de tipo integer, que no va ser nunca negativo
            $table->foreign('pais_id')->references('id')->on('pais'); //el atributo pais_id se relaciona a una llave foranea especificamente con el id del modelo pais
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('departamentos'); //en caso de realizar un rollback se borrara la tabla de la BD
    }
}
