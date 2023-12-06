<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function showMessage()
    {

        if(Auth()->user()) {
            $id_usuario = Auth()->user()->id_usuarios;
        } else {
            $id_usuario = 0;
        }
        $usuarios2 = DB::SELECT("SELECT u1.id_usuarios, u1.nombre_cuenta, u1.foto_perfil FROM usuarios u1
             WHERE not (u1.id_usuarios in (
                 SELECT s.id_seguido FROM seguidores s
                 WHERE s.id_sigue = '$id_usuario' and s.id_seguido = u1.id_usuarios) or 
                 u1.id_usuarios = '$id_usuario')
                 group by u1.id_usuarios, u1.nombre_cuenta, u1.foto_perfil
                 LIMIT 4");
        if (session('espremium')) {
            return view('premium/message-premium', compact('usuarios2'));
        }
        return view('messages', compact('usuarios2'));


    }
}
