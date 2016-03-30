<?php

namespace SAC\Http\Requests;

use SAC\Http\Requests\Request;

class CapitulosRequest extends Request
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
            'Descripcion'            => 'required',

        ];
    }

    public function messages()
    {
        return [
            'Descripcion.required'      => 'El campo Descripcion es obligatorio.',
        ];
    }
}
