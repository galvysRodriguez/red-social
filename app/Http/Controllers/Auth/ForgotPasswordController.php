<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\Validaciones\userValidation;
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
        try {
            $claseValidar = new userValidation();
            $validator = $claseValidar->validarUsuario($request);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $usuario = $request->input('usuario');
            $resultado = Db::select(
                "SELECT id_usuarios, correo FROM usuarios 
                                        WHERE nombre_usuario = ? or correo = ?",
                [$usuario, $usuario]
            );

            if(!empty($resultado)) {
                if($resultado == 0) {
                    //error general
                    return redirect()->back()->withErrors(['error' => 'Usuario o correo incorrecto']);
                } else {
                    // Guardar la salida en la sesión
                    $request->session()->put('salida', $resultado[0]->id_usuarios);
                    // Lógica para generar token y enviar correo electrónico
                    $token = Str::random(60);
                    Db::insert("INSERT INTO tokens(id_usuarios, token)
                                VALUES (?, ?)", [$resultado[0]->id_usuarios, $token]);
                    Mail::to($resultado[0]->correo)->send(new MiCorreo($token));

                    return view('mailConfirmation');
                }
            } else {
                return redirect()->back()->withErrors(['error' => 'Usuario o correo incorrecto']);
            }
        } catch (\Exception $e) {
            // Manejo de errores y redirección con mensaje de error
            return redirect()->back()->withErrors(['error' => 'Ha ocurrido un error durante el registro. Por favor, inténtalo de nuevo.'.$e]);
        }
    }


}
