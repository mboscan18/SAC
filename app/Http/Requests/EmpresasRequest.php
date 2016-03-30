<?php

namespace SAC\Http\Requests;

use SAC\Http\Requests\Request;

class EmpresasRequest extends Request
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
            'codIdentificacion_Empresa' => 'required|unique:Empresas,codIdentificacion_Empresa,'.$this->id,
            'nombre_Empresa'            => 'required',

        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es requerido.',
            'codIdentificacion_Empresa.unique'  => 'Ya existe una Empresa con esa identificacion',
            'telefono.numeric'  => 'El campo telefono debe ser del tipo numerico',
            'logo.image'  => 'El campo Logo de Empresa debe ser una foto',
        ];
    }
}
