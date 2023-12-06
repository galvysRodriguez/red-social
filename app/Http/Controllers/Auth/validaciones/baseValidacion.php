<?php

namespace App\Http\Controllers\Auth\validaciones;

use Illuminate\Support\Facades\Validator;

class baseValidacion
{
    public function validarUsuarioContraseña($request)
    {
        $validator = Validator::make($request->all(), [
            'usuario' => 'required|max:125',
            'contraseña' => 'required|string|min:6|max:50',
            [
                'usuario.required' => 'El campo de usuario es obligatorio.',
                'usuario.max' => 'El campo de usuario no debe tener más de 50 caracteres.',
                'contraseña1.required' => 'El campo de contraseña es obligatorio.',
                'contraseña1.string' => 'La contraseña debe ser una cadena de texto.',
                'contraseña1.min' => 'La contraseña debe tener al menos 6 caracteres.',
                'contraseña1.max' => 'La contraseña no debe tener más de 50 caracteres.'
            ]

        ]);
        return $validator;
    }

}
