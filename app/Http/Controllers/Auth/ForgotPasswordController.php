<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
                    return view('updatePassword');
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
            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error durante el registro. Por favor, inténtalo de nuevo.']);
        }
    }

    public function updatePassword(Request $request)
    {
        try
        {
            $validator = Validator::make($request->all(), [
                'contraseña1' => 'required|string|min:6|max:50|same:contraseña2',
                'contraseña2' =>'required|string|min:6|max:50',
                
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        
            $contraseña1 = $request->input('contraseña1');
            $contraseña2 = $request->input('contraseña2');
            $usuario_id = $request->session()->get('salida');
            $salida = null;

            DB::select('CALL ActualizarContraseña(?, ?, @salida)', 
                                array($usuario_id, $contraseña1));
            $resultado = DB::select('SELECT @salida as salida')[0]->salida;
            if($resultado !== null)
            {
                if($resultado == 0)
                {
                    //error general
                    return redirect()->back()->withErrors(['general' => 'Error del usuario']);
                }
                else
                {
                    // Usuario ingresado
                    $user = User::find($resultado);

                    if ($user) {
                        Auth::login($user);
                        // El usuario se ha autenticado manualmente
                        $request->session()->regenerate();
                        return redirect('/');
                    }
                }
            }
            else
            {
                return redirect()->back()->withErrors(['general' => 'Error en la actualizacion']);
            }             
        }
        
        catch (\Exception $e) 
        {
            // Manejo de errores y redirección con mensaje de error
            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error durante el registro. Por favor, inténtalo de nuevo.']);
        }
    }
}
