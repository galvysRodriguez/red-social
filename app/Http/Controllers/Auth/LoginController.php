<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\Validaciones\baseValidacion;
use App\Http\Controllers\Auth\Iniciar\enviarInicio;
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

            $claseValidar = new baseValidacion();
            $validator = $claseValidar->validarUsuarioContraseña($request);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $usuario = $request->input('usuario');
            $contraseña = $request->input('contraseña');
            $resultado = DB::select(
                "SELECT id_usuarios FROM usuarios 
                            WHERE (nombre_usuario = ? OR correo = ?) AND contraseña = ?",
                [$usuario, $usuario, $contraseña]
            );

            $iniciar = new enviarInicio();
            if (!empty($resultado)) {
                return $iniciar->iniciarse($resultado[0]->id_usuarios);
            }

            return$iniciar->iniciarse(0);





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
