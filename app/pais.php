<?php

namespace pruebaujaveriana;

use Illuminate\Database\Eloquent\Model;

class pais extends Model
{
    protected $table = 'pais'; //nombre de la table en la DB

    protected $fillable = ['id','nombre']; //atributos de la tabla

    public $timestamps = false; //deshabilitamos los timestamps

    public function departamento(){
        return $this->hasMany('pruebaujaveriana\departamento'); //establecemos una relacion uno a muchos con el modelo departamento
    }

}
