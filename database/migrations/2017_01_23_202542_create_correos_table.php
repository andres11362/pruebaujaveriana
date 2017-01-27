<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorreosTable extends Migration
{


    //migracion de la tabla correoss, el objetivo es establecer las caracteristicas del modelo que va a ir
    //ligadas a la base de datos


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correos', function (Blueprint $table) {//declaramos el esquema ademas de darle nombre a la tabla que existira en la BD
            $table->increments('id');  //especificamos un id que usara AUTO_INCREMENT
            $table->string('asunto'); //especificamos el asunto como atributo en la tabla, esto se traducira como una variable de tipo varchar en la BD
            $table->string('destinatario'); //especificamos el destinatario como atributo en la tabla, esto se traducira como una variable de tipo varchar en la BD
            $table->text('mensaje'); //especificamos el mensaje como atributo en la tabla, esto se traducira como una variable de tipo text en la BD
            $table->boolean('estado')->nullable(); //especificamos el estado como atributo en la tabla, esto se traducira como una variable de tipo boolean en la BD
            $table->timestamps(); //se usan los timestaps esto con el objetivo de vigilar la fechas de creacion y actualizacion de los registros
            $table->integer('user_id')->unsigned(); //declaramos un atributo de tipo integer, que no va ser nunca negativ
            $table->foreign('user_id')->references('id')->on('users'); //el atributo user_id se relaciona a una llave foranea especificamente con el id del modelo usuarios
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('correos'); //en caso de realizar un rollback se borrara la tabla de la BD
    }
}
