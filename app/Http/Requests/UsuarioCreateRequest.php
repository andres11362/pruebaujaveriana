<?php

namespace pruebaujaveriana\Http\Requests;

use pruebaujaveriana\Http\Requests\Request;

class UsuarioCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|unique:users',
            'nombres' => 'required',
            'apellidos' => 'required',
            'telefono'  => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ];
    }
}