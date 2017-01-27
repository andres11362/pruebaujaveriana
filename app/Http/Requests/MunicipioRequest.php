<?php

namespace pruebaujaveriana\Http\Requests;

use pruebaujaveriana\Http\Requests\Request;

class MunicipioRequest extends Request
{

    //clase de tipo request con el objetivo de hacer validaciones al modelo municipio

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
            'nombre' => 'required|min:3' //se define como un campo requerido de minimo 3 caracteres
        ];
    }
}
