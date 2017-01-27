<?php

namespace pruebaujaveriana;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class municipio extends Model
{
    protected $table = 'municipios';  //nombre de la tabla en la BD

    protected $fillable = ['id','nombre','departamento_id']; //atributos de la tabla

    public $timestamps = false; //deshabilitacion de los timestamps

    public function departamento(){
        return $this->belongsTo('pruebaujaveriana\departamento'); //establecemos una relacion muchos a uno con el modelo departamento
    }

    public function usuarios(){
        return $this->hasMany('pruebaujaveriana\User'); //establecemos una funcion uno a muchos con el modelo de usuarios
    }

    public static function mcpios($id){
        return municipio::where('departamento_id', '=', $id) //creamos una funcion con el querybuilder que nos permite saber que el departamento
            ->get();                                        //que esta ligado a un municipio
    }

    public static function municipios(){
        return DB::table('municipios')
            ->join('departamentos', 'departamentos.id','=','municipios.departamento_id') //creamos una funcion con el querybuilder que nos permite saber que el pais
            ->join('pais', 'pais.id','=','departamentos.pais_id')                        // y el departamento ligado a todos los municipios de la tabla
            ->select('municipios.*','departamentos.nombre as dpto','pais.nombre as pais')//con el objetivo de mostrarlo en el index
            ->get();
    }

    public static function depart(){
        return DB::table('departamentos')    //creamos una funcion con el querybuilder que nos permite saber los departmentos
                ->select('departamentos.*')  //esto con el objetivo de cargarlo en un select
                ->get();
    }

}
