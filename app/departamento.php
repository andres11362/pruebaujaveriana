<?php

namespace pruebaujaveriana;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class departamento extends Model
{
    protected $table = 'departamentos';

    protected $fillable = ['id','nombre','pais_id'];

    public $timestamps = false;

    public function pais(){
        return $this->belongsTo('pruebaujaveriana\pais');
    }

    public function municipios(){
        return $this->hasMany('pruebaujaveriana\municipio');
    }

    public static function dptos($id){
        return departamento::where('pais_id', '=', $id)
               ->get();
    }

    public static function paises(){
        return DB::table('departamentos')
                 ->join('pais', 'pais.id','=','departamentos.pais_id')
                 ->select('departamentos.*','pais.nombre as pais')
                 ->get();
    }

    public static function countries(){
        return DB::table('pais')
                 ->select('pais.*')
                 ->get();
    }

}
