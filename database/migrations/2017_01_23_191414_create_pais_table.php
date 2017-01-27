<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaisTable extends Migration
{
    //migracion de la tabla pais, el objetivo es establecer las caracteristicas del modelo que va a ir
    //ligadas a la base de datos

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pais', function (Blueprint $table) { //declaramos el esquema ademas de darle nombre a la tabla que existira en la BD
            $table->increments('id'); //especificamos un id que usara AUTO_INCREMENT
            $table->string('nombre'); //especificamos el nombre como atributo en la tabla, esto se traducira como una variable de tipo varcher en la BD
            //$table->timestamps(); deshabilitamos los timestamps, ademas de hacer en el modelo.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pais'); //en caso de realizar un rollback se borrara la tabla de la BD
    }
}
