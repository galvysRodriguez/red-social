<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\Validaciones\registerValidation;
use App\Http\Controllers\Auth\Iniciar\enviarInicio;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        try {

            $claseValidar = new registerValidation();
            $validator = $claseValidar->validarRegistro($request);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


            $cuenta = $request->input('cuenta');
            $correo = $request->input('correo');
            $usuario = $request->input('usuario');
            $fecha = $request->input('fecha');
            $contraseña1 = $request->input('contraseña1');
            $contraseña2 = $request->input('contraseña2');
            $salida = null;

            DB::insert(
                "INSERT INTO usuarios(nombre_usuario, nombre_cuenta, contraseña, fecha_nacimiento, correo) 
            VALUES (?, ?, ?, ?, ?)",
                [$usuario, $cuenta, $contraseña1, $fecha, $correo]
            );

            $resultado = DB::getPdo()->lastInsertId();
            $iniciar = new enviarInicio();
            return $iniciar->iniciarse($resultado);

        } catch (\Exception $e) {
            // Manejo de errores y redirección con mensaje de error
            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error durante el registro. Por favor, inténtalo de nuevo.']);
        }
    }


}
