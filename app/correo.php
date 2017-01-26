<?php

namespace pruebaujaveriana;

use Illuminate\Database\Eloquent\Model;

class correo extends Model
{
    protected $table = 'correo';

    protected $fillable = ['id', 'asunto', 'destinatario', 'mensaje', 'user_id'];

    public function usuarios(){
        return $this->hasMany('pruebaujaveriana\User');
    }

}