<?php

namespace SAC\Http\Requests;

use SAC\Http\Requests\Request;

class CentrosCostoRequest extends Request
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
            'cod_CC'            => 'required|unique:CentrosCosto,cod_CC,'.$this->id,
            'descripcion_CC'    => 'required',

        ];
    }

    public function messages()
    {
        return [
            'cod_CC.required'           => 'El campo Codigo es obligatorio.',
            'descripcion_CC.required'   => 'El campo Descripcion es obligatorio.',
            'cod_CC.unique'             => 'Ya existe un Centro de Costo con ese Codigo',
        ];
    }
}
