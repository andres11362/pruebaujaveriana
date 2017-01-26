<?php

namespace pruebaujaveriana;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class municipio extends Model
{
    protected $table = 'municipios';

    protected $fillable = ['id','nombre','departamento_id'];

    public $timestamps = false;

    public function departamento(){
        return $this->belongsTo('pruebaujaveriana\departamento');
    }

    public function usuarios(){
        return $this->hasMany('pruebaujaveriana\User');
    }

    public static function mcpios($id){
        return municipio::where('departamento_id', '=', $id)
            ->get();
    }

    public static function municipios(){
        return DB::table('municipios')
            ->join('departamentos', 'departamentos.id','=','municipios.departamento_id')
            ->join('pais', 'pais.id','=','departamentos.pais_id')
            ->select('municipios.*','departamentos.nombre as dpto','pais.nombre as pais')
            ->get();
    }

    public static function depart(){
        return DB::table('departamentos')
                ->select('departamentos.*')
                ->get();
    }

}
