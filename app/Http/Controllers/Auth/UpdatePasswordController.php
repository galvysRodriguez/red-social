<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\Validaciones\passwordValidation;
use App\Http\Controllers\Auth\Iniciar\enviarInicio;
use App\Models\User;

class UpdatePasswordController extends Controller
{
    public function showUpdatePassword(Request $request, $token)
    {
        try {
            $salida = null;
            /*DB::select('CALL conseguirToken(?, @resultado)', array($token));
            $resultado = DB::select('SELECT @resultado as resultado')[0]->resultado;*/
            $resultado = Db::select(
                "SELECT id_usuarios FROM tokens
                                    WHERE token = ?",
                [$token]
            );
            if(!empty($resultado)) {
                $request->session()->put('salida', $resultado[0]->id_usuarios);
                return view('updatePassword');
            }

        } catch (\Exception $e) {
            // Manejo de errores y redirección con mensaje de error
            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error durante el registro. Por favor, inténtalo de nuevo.'.$e]);
        }

    }

    public function updatePassword(Request $request)
    {
        try {
            $claseValidar = new passwordValidation();
            $validator = $claseValidar->validarContraseña($request);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $contraseña1 = $request->input('contraseña1');
            $contraseña2 = $request->input('contraseña2');
            $usuario_id = (int) $request->session()->get('salida');

            DB::update(
                "UPDATE usuarios SET contraseña = ? WHERE id_usuarios = ?",
                [$contraseña1, $usuario_id]
            );
            $iniciar = new enviarInicio();
            return $iniciar->iniciarse($usuario_id);




        } catch (\Exception $e) {
            // Manejo de errores y redirección con mensaje de error
            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error durante el registro. Por favor, inténtalo de nuevo.' .$e]);
        }
    }
}
