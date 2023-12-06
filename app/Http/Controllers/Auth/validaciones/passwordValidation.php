<?php

namespace App\Http\Controllers\Auth\validaciones;

use Illuminate\Support\Facades\Validator;

class passwordValidation
{
    public function validarContraseña($request)
    {
        $validator = Validator::make($request->all(), [
            'contraseña1' => 'required|string|min:6|max:50',
            'contraseña2' => 'required|string|min:6|max:50',
            [
                'contraseña1.required' => 'El campo de contraseña es obligatorio.',
                'contraseña1.string' => 'La contraseña debe ser una cadena de texto.',
                'contraseña1.min' => 'La contraseña debe tener al menos 6 caracteres.',
                'contraseña1.max' => 'La contraseña no debe tener más de 50 caracteres.',
                'contraseña1.same' => 'Las contraseñas deben coincidir.',
                'contraseña2.required' => 'Debes confirmar la contraseña.',
                'contraseña2.string' => 'La confirmación de la contraseña debe ser una cadena de texto.',
                'contraseña2.min' => 'La confirmación de la contraseña debe tener al menos 6 caracteres.',
                'contraseña2.max' => 'La confirmación de la contraseña no debe tener más de 50 caracteres.'
            ]

        ]);
        return $validator;
    }

}
