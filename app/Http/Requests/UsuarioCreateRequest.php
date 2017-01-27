<?php

namespace pruebaujaveriana\Http\Requests;

use pruebaujaveriana\Http\Requests\Request;

class UsuarioCreateRequest extends Request
{
    //clase de tipo request con el objetivo de hacer validaciones al modelo municipio en el caso de un store
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //se autoriza el uso de request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() //se definen las reglas del request
    {
        return [
            'id' => 'required|unique:users',//se define como un campo requerido y unico en relacion a los registros del modelo usuarios
            'nombres' => 'required', //se define como un campo requerido
            'apellidos' => 'required', //se define como un campo requerido
            'telefono'  => 'required', //se define como un campo requerido
            'email' => 'required|email|unique:users', //se define como un campo requerido, de tipo email y unico en relacion a los registros del modelo usuarios
            'password' => 'required|min:6', //se define como un campo requerido de minimo 6 caracteres
        ];
    }
}
