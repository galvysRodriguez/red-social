<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'usuario' => 'required|max:125',
                'contraseña' => 'required|string|min:6|max:50',

            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $usuario = $request->input('usuario');
            $contraseña = $request->input('contraseña');
            $salida = null;

            DB::select('CALL IniciarSesion(?, ?, @salida)', array($usuario, $contraseña));

            $resultado = DB::select('SELECT @salida as salida')[0]->salida;
            if($resultado != null) {
                if($resultado == 0) {
                    // Error general
                    return redirect()->back()->withErrors(['error login' => 'Credenciales inválidas']);
                } else {
                    // Usuario ingresado
                    $user = User::find($resultado);

                    if ($user) {
                        Auth::login($user);
                        // El usuario se ha autenticado manualmente
                        $request->session()->regenerate();
                        return redirect('/');
                    }
                }
            } else {
                return redirect()->back()->withErrors(['error-login' => 'Credenciales inválidas']);
            }
        } catch (\Exception $e) {
            // Manejo de errores y redirección con mensaje de error
            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error durante el registro. Por favor, inténtalo de nuevo.']);
        }
    }

    public function cerrar(Request $request)
    {
        // Cierre de sesión
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirige a la página de inicio u otra página deseada después del cierre de sesión.
        return redirect('/');
    }
}
