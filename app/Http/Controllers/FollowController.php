<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class FollowController extends Controller
{
    public function follows(Request $request)
    {
        $id_seguido = $request->input('valor');
        $id_usuario = Auth()->user()->id_usuarios;
        $valor = db::SELECT(
            "SELECT COUNT(*) as count FROM seguidores s
                             WHERE s.id_seguido = ? and s.id_sigue = ?",
            [$id_seguido, $id_usuario]
        );
        if($valor[0]->count == 0) {
            db::insert(
                "INSERT INTO seguidores(id_seguido, id_sigue) VALUES(?,?)",
                [$id_seguido, $id_usuario]
            );
            $resultado = DB::getPdo()->lastInsertId();
            db::insert("INSERT IGNORE INTO notificaciones( id_acciones, tipo_notificaciones) 
                        VALUES (?,  'seguir')", [$resultado]);
        } else {
            db::delete(
                "DELETE n FROM notificaciones n
                        INNER JOIN seguidores s on n.id_acciones = s.id
                        WHERE s.id_seguido= ? and n.tipo_notificaciones = 'seguir' AND
                            s.id_sigue = ?",
                [$id_seguido, $id_usuario]
            );

            db::DELETE(
                "DELETE FROM seguidores
                        WHERE id_seguido = ? AND id_sigue = ?",
                [$id_seguido, $id_usuario]
            );

        }
        return response()->json(['success' => true]);

    }

    public function showFollow()
    {
        if(Auth()->user()) {
            $id_usuario = Auth()->user()->id_usuarios;
        } else {
            $id_usuario = 0;
        }
        //mostrar usuarios que no sigues
        $usuarios2 = DB::SELECT("SELECT u1.id_usuarios, u1.nombre_cuenta, u1.foto_perfil FROM usuarios u1
         WHERE not (u1.id_usuarios in (
             SELECT s.id_seguido FROM seguidores s
             WHERE s.id_sigue = '$id_usuario' and s.id_seguido = u1.id_usuarios) or 
             u1.id_usuarios = '$id_usuario')
             group by u1.id_usuarios, u1.nombre_cuenta, u1.foto_perfil
             LIMIT 4");
        $mensaje = "Usuarios de interes";
        
        $usuarios = DB::SELECT("SELECT u1.id_usuarios, u1.nombre_cuenta, u1.foto_perfil FROM usuarios u1
                                WHERE not (u1.id_usuarios in (
                                    SELECT s.id_seguido FROM seguidores s
                                    WHERE s.id_sigue = '$id_usuario' and s.id_seguido = u1.id_usuarios) or 
                                    u1.id_usuarios = '$id_usuario')");
        if (session('espremium')) {
            return view('premium/followers-premium', compact('usuarios', 'mensaje', 'usuarios2'));
        }
        return view('followers', compact('usuarios', 'mensaje', 'usuarios2'));
    }
}
