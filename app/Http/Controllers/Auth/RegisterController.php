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
                'correo' => 'required|email|regex:/@((gmail|yahoo|outlook|hotmail|aol|protonmail|icloud|mail|inbox|zoho|yandex|gmx|fastmail|lycos|hushmail|runbox|tutanota|disroot)\.(com|net|org|edu|int|info|co|io))$/i|unique:users,email',
                'usuario' => 'required|max:50',
                'cuenta' => 'required|max:50',
                'fecha' => 'required|date|before_or_equal:18 years ago|after_or_equal:80 years ago',
                'contraseña1' => 'required|string|min:6|max:50|same:contraseña2',
                'contraseña2' =>'required|string|min:6|max:50',
                
            ], [
                'correo.required' => 'El campo de correo electrónico es obligatorio.',
                'correo.email' => 'Por favor, introduce un correo electrónico válido.',
                'correo.regex' => 'El correo electrónico no es de un proveedor válido.',
                'correo.unique' => 'Este correo electrónico ya está en uso.',
                'usuario.required' => 'El campo de usuario es obligatorio.',
                'usuario.max' => 'El campo de usuario no debe tener más de 50 caracteres.',
                'cuenta.required' => 'El campo de cuenta es obligatorio.',
                'cuenta.max' => 'El campo de cuenta no debe tener más de 50 caracteres.',
                'fecha.required' => 'El campo de fecha de nacimiento es obligatorio.',
                'fecha.date' => 'Por favor, introduce una fecha de nacimiento válida.',
                'fecha.before_or_equal' => 'Debes tener al menos 18 años.',
                'fecha.after_or_equal' => 'No puedes tener más de 80 años.',
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
