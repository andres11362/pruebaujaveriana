<?php

namespace pruebaujaveriana;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class correo extends Model
{
    protected $table = 'correos';

    protected $fillable = ['id', 'asunto', 'destinatario', 'mensaje', 'estado' ,'user_id'];

    public function usuarios(){
        return $this->hasMany('pruebaujaveriana\User');
    }

    public static function mails($usuario){
        return DB::table('correos')
               ->where('user_id',$usuario)
               ->select('correos.*')
               ->get();
    }

}