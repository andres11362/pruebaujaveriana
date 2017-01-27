<?php

namespace pruebaujaveriana\Http\Requests;

use pruebaujaveriana\Http\Requests\Request;

class CorreoRequest extends Request
{

    //clase de tipo request con el objetivo de hacer validaciones al modelo correo

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
            'asunto' => 'required', //se define como un campo requerido
            'destinatario' => 'required|email', //se define como un campo requerido ademas de ser de tipo email
            'mensaje' => 'required' //se define como un campo requerido
        ];
    }
}
