<?php

namespace pruebaujaveriana;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class correo extends Model
{
    protected $table = 'correos'; //nombre de la tabla en la BD

    protected $fillable = ['id', 'asunto', 'destinatario', 'mensaje', 'estado' ,'user_id']; //atributos de la tabla

    public function usuarios(){
        return $this->hasMany('pruebaujaveriana\User'); //establecemos una funcion uno a muchos con el modelo de usuarios
    }

    public static function mails($usuario){ //creamos una funcion con el querybuilder que nos permite saber que correos tiene el
        return DB::table('correos')         //el usuario activo en la sesion.
               ->where('user_id',$usuario)
               ->select('correos.*')
               ->get();
    }

}