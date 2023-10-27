<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        try
        {
            $validator = Validator::make($request->all(), [
                'correo' => 'required|email',
                'usuario' => 'required|max:50',
                'cuenta' => 'required|max:50',
                'fecha' => 'required|date|before_or_equal:today',
                'contraseña1' => 'required|string|min:6|max:50|same:contraseña2',
                'contraseña2' =>'required|string|min:6|max:50',
                
            ]);
        
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

            DB::select('CALL InsertarPersona(?, ?, ?, ?, ?, @salida)', 
                                array($usuario, $cuenta, $contraseña1, $fecha, $correo));
            $resultado = DB::select('SELECT @salida as salida')[0]->salida;
            if($resultado !== null)
            {
                if($resultado == 0)
                {
                    //error general
                    return redirect()->back()->withErrors(['general' => 'Error general']);
                }
                else if($resultado == -1)
                {
                     //el usuario ya existe
                     return redirect()->back()->withErrors(['usuario' => 'El usuario ya existe']);
                }
                else if($resultado == -2)
                {
                    //el correo ya existe
                    return redirect()->back()->withErrors(['correo' => 'El correo ya existe']);
                }
                else
                {
                    //usuario ingresado
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
                return redirect()->back()->withErrors(['general' => 'El usuario o correo ya existe']);
            }             
        }
        
        catch (\Exception $e) 
        {
            // Manejo de errores y redirección con mensaje de error
            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error durante el registro. Por favor, inténtalo de nuevo.']);
        }
    }
        

}
