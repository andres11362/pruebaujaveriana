<?php

namespace pruebaujaveriana;

use Illuminate\Database\Eloquent\Model;

class pais extends Model
{
    protected $table = 'pais';

    protected $fillable = ['id','nombre'];

    public $timestamps = false;

    public function departamento(){
        return $this->hasMany('pruebaujaveriana\departamento');
    }

}
