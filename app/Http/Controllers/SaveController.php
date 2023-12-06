<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Publicacion;
use Illuminate\Support\Facades\Auth;

class SaveController extends Controller
{
    public function showSaves()
    {
        $idUsuario = Auth()->user()->id_usuarios;
        $publicaciones = Db::Select("SELECT * FROM publicaciones p 
                                    INNER JOIN guardados g on p.id = g.id_publicaciones
                                    WHERE g.id_usuarios = '$idUsuario'");
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
            return view('premium/saves-premium', ['publicaciones' => $publicaciones,
            'usuarios2' => $usuarios2 ]);
        }

        return view('saves', ['publicaciones' => $publicaciones,
                                'usuarios2' => $usuarios2]);
    }

    public function saves(Request $request)
    {
        try {
            $id_usuario = Auth()->user()->id_usuarios;
            $id_publicacion = $request->input('valor');
            $valor = db::SELECT(
                "SELECT COUNT(*) as count FROM guardados g
                                INNER JOIN publicaciones p on p.id = g.id_publicaciones
                                WHERE p.id = ? and g.id_usuarios = ?",
                [$id_publicacion, $id_usuario]
            );

            if ($valor[0]->count == 0) {
                db::insert(
                    "INSERT IGNORE INTO guardados (id_publicaciones, id_usuarios) VALUES (?, ?)",
                    [$id_publicacion, $id_usuario]
                );
            } else {
                db::delete(
                    "DELETE g FROM guardados g
                            INNER JOIN publicaciones p on p.id = g.id_publicaciones
                            WHERE p.id = ? and g.id_usuarios = ?",
                    [$id_publicacion, $id_usuario]
                );
            }

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            // Loguea el error o devuelve una respuesta de error
            return response()->json(['error' => 'Error interno del servidor: ' . $e->getMessage()], 500);
        }

    }
}
