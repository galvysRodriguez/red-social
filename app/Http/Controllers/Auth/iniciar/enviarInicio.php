<?php

namespace App\Http\Controllers\Auth\Iniciar;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class enviarInicio
{
    public function esPremium($userId)
    {
        $espremium = DB::select("SELECT COUNT(*) as count FROM suscripciones s
        INNER JOIN usuarios u on s.id_usuarios = u.id_usuarios
        WHERE DATEDIFF(NOW(), s.fecha) < 30 and u.id_usuarios = '$userId'");
        return $espremium[0]->count > 0;
    }

    public function ingresar($resultado)
    {
        $user = User::find($resultado);
        session(['espremium' => false]);

        if ($user) {
            if($this->esPremium($resultado)) {
                session(['espremium' => true]);
            }
            Auth::login($user);  // El usuario se ha autenticado manualmente
            $request->session()->regenerate();

            return redirect('/');
        }
        return redirect()->back()->withErrors(['error login' => 'Credenciales inválidas']);
    }

    public function iniciarse($resultado)
    {

        if($resultado != null) {
            if($resultado == 0) {
                // Error general
                return redirect()->back()->withErrors(['error login' => 'Credenciales inválidas']);
            } elseif($resultado == -1) {
                //el usuario ya existe
                return redirect()->back()->withErrors(['usuario' => 'El usuario ya existe']);
            } elseif($resultado == -2) {
                //el correo ya existe
                return redirect()->back()->withErrors(['correo' => 'El correo ya existe']);
            } else {
                $this->ingresar($resultado);
            }
        } else {
            return redirect()->back()->withErrors(['error-login' => 'Credenciales inválidas']);
        }
    }

}
