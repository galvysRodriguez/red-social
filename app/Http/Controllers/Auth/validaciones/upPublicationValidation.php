<?php

namespace App\Http\Controllers\Auth\validaciones;

use Illuminate\Support\Facades\Validator;

class upPublicationValidation
{
    public function validarSubir($request)
    {

        $validador = Validator::make($request->all(), [
            'archivo' => 'required|image|mimes:jpeg,png,jpg,gif,webp,jfif|max:2048',
        ], [
            'archivo.required' => 'El archivo de imagen es obligatorio.',
            'archivo.image' => 'El archivo debe ser una imagen.',
            'archivo.mimes' => 'El archivo debe tener uno de los formatos: jpeg, png, jpg, gif, webp, jfif.',
            'archivo.max' => 'El tamaño máximo del archivo es 2 MB.',
        ]);

        return $validador;
    }

}
