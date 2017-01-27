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

    //se uso el modelo base de usuarios de laravel esto con el objetivo de aprovechar algunos de sus metodos


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users'; //nombre de la tabla en la BD

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nombres', 'apellidos', 'telefono' ,'email', 'password','municipio_id']; //atributos de la tabla

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token']; //se declara que atributos estaran escondidos en la aplicacion

    public $timestamps = false; //deshabilitamos los timestamps

    public function municipio(){
        return $this->belongsTo('pruebaujaveriana\municipio'); //establecemos una relacion muchos a uno con el modelo municipio
    }

    public function correo(){
        return $this->belongsTo('pruebaujaveriana\correo'); //establecemos una relacion muchos a uno con el modelo correo
    }

    public static function dataLocal(){   //creamos una funcion con el querybuilder que nos permite saber que municipios,
        return DB::table('users')         //departamentos, paises estân relacionados con los usuarios, se usa paginacion en esta caso.
                    ->join('municipios', 'municipios.id','=','users.municipio_id')
                    ->join('departamentos', 'departamentos.id','=','municipios.departamento_id')
                    ->join('pais', 'pais.id','=','departamentos.pais_id')
                    ->select('users.*', 'municipios.nombre as municipio', 'departamentos.nombre as departamento', 'pais.nombre as pais')
                    ->paginate(2);
    }

    public static function dataUser($id){ //creamos una funcion con el querybuilder que nos permite saber que municipio,
        return DB::table('users')         //departamento, pais estân relacionados con un usuario en especifico.
            ->join('municipios', 'municipios.id','=','users.municipio_id')
            ->join('departamentos', 'departamentos.id','=','municipios.departamento_id')
            ->join('pais', 'pais.id','=','departamentos.pais_id')
            ->where('users.id',$id)
            ->select('municipios.id as munid','municipios.nombre as municipio','departamentos.id as depid',
                'departamentos.nombre as departamento','pais.id as paisid', 'pais.nombre as pais')
            ->get();
    }


}
