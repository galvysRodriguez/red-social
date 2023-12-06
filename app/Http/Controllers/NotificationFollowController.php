<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NotificationFollowController extends Controller
{
    public function showNotification()
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
        $notificaciones = db::select("SELECT n.fecha, u.nombre_cuenta, u.foto_perfil, u.id_usuarios FROM notificaciones n
        INNER JOIN seguidores s on s.id = n.id_acciones
        INNER JOIN usuarios u on s.id_sigue = u.id_usuarios
        WHERE s.id_seguido ='$id_usuario'
        
    
        ");

        if (session('espremium')) {
            return view('premium/notFollow-premium', compact('usuarios2', 'notificaciones'));
        }
        return view('notFollow', compact('usuarios2', 'notificaciones'));
    }
}
