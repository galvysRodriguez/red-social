<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function likes(Request $request)
    {
        try {
            $id_usuario = Auth()->user()->id_usuarios;
            $id_publicacion = $request->input('valor');
            $valor = db::SELECT(
                "SELECT COUNT(*) as count FROM gustos g
                                INNER JOIN publicaciones p on p.id = g.id_publicaciones
                                WHERE p.id = ? and g.id_usuarios = ?",
                [$id_publicacion, $id_usuario]
            );
            if($valor[0]->count == 0) {
                db::insert(
                    "INSERT IGNORE INTO gustos (id_publicaciones, id_usuarios) VALUES (?, ?)",
                    [$id_publicacion, $id_usuario]
                );
                $resultado = DB::getPdo()->lastInsertId();



                db::insert("INSERT IGNORE INTO notificaciones(id_acciones, tipo_notificaciones) 
                        VALUES (?,  'megusta')", [$resultado]);
            } else {
                db::delete(
                    "DELETE n FROM notificaciones n
                            INNER JOIN gustos g on n.id_acciones = g.id
                           WHERE g.id_publicaciones= ? and n.tipo_notificaciones = 'megusta'
                                and g.id_usuarios = ?",
                    [$id_publicacion, $id_usuario]
                );

                db::delete(
                    "DELETE g FROM gustos g
                       INNER JOIN publicaciones p on p.id = g.id_publicaciones
                       WHERE p.id = ? and g.id_usuarios = ?",
                    [$id_publicacion, $id_usuario]
                );

            }

            // ... tu lógica de controlador ...
            return response()->json(['success' => true,
                                    'publicacion' => $id_publicacion]);
        } catch (\Exception $e) {
            // Loguea el error o devuelve una respuesta de error
            return response()->json(['error' => 'Error interno del servidor' .$e], 500);
        }

    }
}
