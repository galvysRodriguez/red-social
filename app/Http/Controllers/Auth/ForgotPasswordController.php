<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MiCorreo;
use Illuminate\Support\Str;


class ForgotPasswordController extends Controller
{
    public function showForgotPassword()
    {
        return view('forgotPassword');
    }

    public function forgotPassword(Request $request)
    {
        try
        {
            $validator = Validator::make($request->all(), [
                'usuario' => 'required|max:125'],
                [
                    'usuario.required' => 'El campo de usuario es obligatorio.',
                    'usuario.max' => 'El campo de usuario no debe tener más de 125 caracteres.',
                    'contraseña1.required' => 'El campo de contraseña es obligatorio.',
                    'contraseña1.string' => 'La contraseña debe ser una cadena de texto.',
                    'contraseña1.min' => 'La contraseña debe tener al menos 6 caracteres.',
                    'contraseña1.max' => 'La contraseña no debe tener más de 50 caracteres.',
                    'contraseña1.same' => 'Las contraseñas deben coincidir.',
                    'contraseña2.required' => 'Debes confirmar la contraseña.',
                    'contraseña2.string' => 'La confirmación de la contraseña debe ser una cadena de texto.',
                    'contraseña2.min' => 'La confirmación de la contraseña debe tener al menos 6 caracteres.',
                    'contraseña2.max' => 'La confirmación de la contraseña no debe tener más de 50 caracteres.'
                ]);
        
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        
            
            $usuario = $request->input('usuario');
            $salida = null;

            DB::select('CALL RestablecerContraseña(?, @salida)', array($usuario));
            $resultado = DB::select('SELECT @salida as salida')[0]->salida;
            if($resultado != null)
            {
                if($resultado == 0)
                {
                    //error general
                    return redirect()->back()->withErrors(['error' => 'Usuario o correo incorrecto']);
                }
                else
                {
                    //usuario ingresado
                    // Guardar la salida en la sesión
                    $request->session()->put('salida', $resultado);
                    // Lógica para generar token y enviar correo electrónico
                    $token = Str::random(60);
                    DB::select('CALL crearToken(?, ?)', array($resultado, $token));
                    Mail::to($usuario)->send(new MiCorreo($token));
                    
                    return view('mailConfirmation');
                }
            }
            else
            {
                return redirect()->back()->withErrors(['error' => 'Usuario o correo incorrecto']);
            }             
        }
        
        catch (\Exception $e) 
        {
            // Manejo de errores y redirección con mensaje de error
            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error durante el registro. Por favor, inténtalo de nuevo.'.$e]);
        }
    }

    
}
