<?php

namespace pruebaujaveriana;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\DB;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nombres', 'apellidos', 'telefono' ,'email', 'password','municipio_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public $timestamps = false;

    public function municipio(){
        return $this->belongsTo('pruebaujaveriana\municipio');
    }

    public function correo(){
        return $this->belongsTo('pruebaujaveriana\correo');
    }

    public static function dataLocal(){
        return DB::table('users')
                    ->join('municipios', 'municipios.id','=','users.municipio_id')
                    ->join('departamentos', 'departamentos.id','=','municipios.departamento_id')
                    ->join('pais', 'pais.id','=','departamentos.pais_id')
                    ->select('users.*', 'municipios.nombre as municipio', 'departamentos.nombre as departamento', 'pais.nombre as pais')
                    ->paginate(2);
    }

    public static function dataUser($id){
        return DB::table('users')
            ->join('municipios', 'municipios.id','=','users.municipio_id')
            ->join('departamentos', 'departamentos.id','=','municipios.departamento_id')
            ->join('pais', 'pais.id','=','departamentos.pais_id')
            ->where('users.id',$id)
            ->select('municipios.id as munid','municipios.nombre as municipio','departamentos.id as depid',
                'departamentos.nombre as departamento','pais.id as paisid', 'pais.nombre as pais')
            ->get();
    }


}
