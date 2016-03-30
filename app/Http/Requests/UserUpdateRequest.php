<?php

namespace SAC\Http\Requests;

use SAC\Http\Requests\Request;

class UserUpdateRequest extends Request
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
            'identificacion_Usuario'    => 'required|unique:Usuarios,identificacion_Usuario,'.$this->id,
            'email'                     => 'required|email|unique:Usuarios,email,'.$this->id,
            'nombre_Usuario'            => 'required',
            'apellido_Usuario'          => 'required',
            'telefono_Usuario'          => 'required|numeric',
            'sexo_Usuario'              => 'required',
            'rol_Usuario'               => 'required',
            'password'                  => 'min:5',
        ];
    }

    public function messages()
    {
        return [
            'identificacion_Usuario.unique'  => 'Ya existe un Usuario con esa identificacion',
            'email.unique'  => 'Ya existe un Usuario con ese correo electronico',
            'password.min'  => 'La contraseña debe contener 5 caracteres como Minimo',
        ];
    }
}
