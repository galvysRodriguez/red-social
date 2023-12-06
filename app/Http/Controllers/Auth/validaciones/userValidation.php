<?php

namespace App\Http\Controllers\Auth\validaciones;

use Illuminate\Support\Facades\Validator;

class userValidation
{
    public function validarUsuario($request)
    {
        $validator = Validator::make($request->all(), [
            'usuario' => 'required|max:200',
            [
                'usuario.required' => 'El campo de usuario es obligatorio.',
                'usuario.max' => 'El campo de usuario no debe tener más de 200 caracteres.',
            ]

        ]);
        return $validator;
    }

}
