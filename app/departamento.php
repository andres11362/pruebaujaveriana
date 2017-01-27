<?php

namespace pruebaujaveriana;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class departamento extends Model
{
    protected $table = 'departamentos'; //nombre de la tabla en la BD

    protected $fillable = ['id','nombre','pais_id']; //atributos de la tabla

    public $timestamps = false; //deshabilitacion de los timestamps

    public function pais(){
        return $this->belongsTo('pruebaujaveriana\pais'); //establecemos una relacion muchos a uno con el modelo pais
    }

    public function municipios(){
        return $this->hasMany('pruebaujaveriana\municipio'); //establecemos una relacion uno a muchos con el modelo municipio
    }

    public static function dptos($id){                  //creamos una funcion con el querybuilder que nos permite saber que el pais
        return departamento::where('pais_id', '=', $id) //relacionado con el departamento al que pertenece el municipio
               ->get();
    }

    public static function paises(){
        return DB::table('departamentos')
                 ->join('pais', 'pais.id','=','departamentos.pais_id') //creamos una funcion con el querybuilder que nos permite saber los paises
                 ->select('departamentos.*','pais.nombre as pais')     //relacionados con los departamentos que se mostraran en el index correspondiente
                 ->get();
    }

    public static function countries(){  //creamos una funcion con el querybuilder que nos permite saber los paises
        return DB::table('pais')         //esto con el objetivo de cargarlo en un select
                 ->select('pais.*')
                 ->get();
    }

}
