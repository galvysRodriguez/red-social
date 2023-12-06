<?php

namespace App\Http\Controllers\Auth\validaciones;

use Illuminate\Support\Facades\Validator;

class editProfileValidation
{
    public function validarEditarPerfil($request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'archivo' => 'required|image|mimes:jpeg,png,jpg,gif,webp,jfif|max:2048',
            'nombre_cuenta' => 'required|string|max:50',
            'nombre_usuario' => 'required|string|max:50',
            'descripcion' => 'required|string|max:255',],
            [
            'archivo.required' => 'El archivo de imagen es obligatorio.',
            'archivo.image' => 'El archivo debe ser una imagen.',
            'archivo.mimes' => 'El archivo debe tener uno de los formatos: jpeg, png, jpg, gif, webp, jfif.',
            'archivo.max' => 'El tamaño máximo del archivo es 2 MB.',
            'nombre_cuenta.required' => 'El campo nombre de cuenta es obligatorio.',
            'nombre_cuenta.string' => 'El campo nombre de cuenta debe ser una cadena de caracteres.',
            'nombre_cuenta.max' => 'El campo nombre de cuenta no debe tener más de 50 caracteres.',
            'nombre_usuario.required' => 'El campo nombre de usuario es obligatorio.',
            'nombre_usuario.string' => 'El campo nombre de usuario debe ser una cadena de caracteres.',
            'nombre_usuario.max' => 'El campo nombre de usuario no debe tener más de 50 caracteres.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'descripcion.string' => 'El campo descripción debe ser una cadena de caracteres.',
            'descripcion.max' => 'El campo descripción no debe tener más de 255 caracteres.',
        ]
        );
        return $validator;
    }

}
