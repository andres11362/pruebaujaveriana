<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{


    //migracion de la tabla users, el objetivo es establecer las caracteristicas del modelo que va a ir
    //ligadas a la base de datos

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {//declaramos el esquema ademas de darle nombre a la tabla que existira en la BD
            $table->integer('id')->unsigned(); //especificamos un id que se ingresado por usuario, como un valor integer
            $table->string('nombres'); //especificamos el nombres como atributo en la tabla, esto se traducira como una variable de tipo varchar en la BD
            $table->string('apellidos'); //especificamos el apellidos como atributo en la tabla, esto se traducira como una variable de tipo varchar en la BD
            $table->bigInteger('telefono'); //especificamos el telefono como atributo en la tabla, esto se traducira como una variable de tipo BIGINT en la BD
            $table->string('email')->unique(); //especificamos el email como atributo en la tabla, esto se traducira como una variable de tipo varchar en la BD, ademas de ser de tipo UNIQUE
            $table->string('password', 60); //especificamos el password como atributo en la tabla, esto se traducira como una variable de tipo varchar en la BD
            $table->rememberToken(); //La tabla users utiliza un token por defecto, este permitira la realizacion de transacciones en la aplicacion
            //$table->timestamps();  deshabilitamos los timestamps, ademas de hacer en el modelo.
            $table->primary('id'); //se especifica que el atributo id sera la llave primaria de nuestra tabla
            $table->integer('municipio_id')->unsigned(); //declaramos un atributo de tipo integer, que no va ser nunca negativo
            $table->foreign('municipio_id')->references('id')->on('municipios'); //el atributo municipio_id se relaciona a una llave foranea especificamente con el id del modelo municipio
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');//en caso de realizar un rollback se borrara la tabla de la BD
    }
}
