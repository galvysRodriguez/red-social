<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Publicacion;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\Iniciar\enviarInicio;

class PublicacionController extends Controller
{
    public function index(Request $request)
    {
        $publicaciones = DB::SELECT("SELECT id, contenido FROM publicaciones
                                    ORDER BY fecha desc");
        $historias = DB::SELECT("SELECT * FROM historias");

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

        if(Auth::check()) {
            $usuario = Auth::user();
            $idUsuario = $usuario->id_usuarios;
            $usuarioshistorias = DB::SELECT("SELECT distinct u.id_usuarios, u.* FROM historias h
                                            INNER JOIN usuarios u on u.id_usuarios = h.id_usuarios
                                            WHERE h.id_usuarios != '$idUsuario'
                                            ");
            $mishistorias = DB::SELECT("SELECT * FROM historias h
                                        INNER JOIN usuarios u on u.id_usuarios = h.id_usuarios
                                        WHERE h.id_usuarios = '$idUsuario'");
            $inicios = new enviarInicio();

            if (session('espremium')) {
                return view('premium/index-premium', compact('historias', 'publicaciones', 'usuarioshistorias', 'mishistorias', 'usuarios2'));
            }

        } else {
            $usuarioshistorias = DB::SELECT("SELECT distinct u.id_usuarios, u.* FROM historias h
                                            INNER JOIN usuarios u on u.id_usuarios = h.id_usuarios");
            $mishistorias = null;
        }



        return view('index', compact('historias', 'publicaciones', 'usuarioshistorias', 'mishistorias', 'usuarios2'));

    }

    public function showLikes(Request $request)
    {
        $id_publicacion =  $request->input('valor');

        if(auth()->user()) {
            $idUsuario = Auth()->user()->id_usuarios;
        } else {
            $idUsuario = 0;
        }


        $megusta = DB::SELECT("SELECT COUNT(*) as count FROM publicaciones p 
                                INNER JOIN gustos g on g.id_publicaciones = p.id
                                WHERE g.id_usuarios = '$idUsuario' and p.id='$id_publicacion'");
        $guardado = DB::SELECT("SELECT COUNT(*) as count FROM publicaciones p 
                                INNER JOIN guardados g on g.id_publicaciones = p.id
                                WHERE p.id_usuarios = '$idUsuario' and p.id='$id_publicacion'");
        $usuarioPublicacion = DB::SELECT("SELECT COUNT(gus.id) as cant_megusta,
                                            u.id_usuarios, u.foto_perfil, u.nombre_cuenta,
                                            u.nombre_usuario, p.descripcion, p.fecha FROM publicaciones p
                                        INNER JOIN usuarios u on p.id_usuarios = u.id_usuarios
                                        LEFT JOIN gustos gus on gus.id_publicaciones = p.id
                                        WHERE p.id = '$id_publicacion'");

        /*DB::select('CALL infoPublicacion(?, ?, @megusta, @guardado)', array($id_usuario, $id_publicacion));
        $megusta = DB::select('SELECT @megusta as megusta')[0]->megusta;
        $guardado = DB::select('SELECT @guardado as guardado')[0]->guardado;*/

        return response()->json([
            'megusta' => $megusta[0]->count,
            'guardado' => $guardado[0]->count,
            'usuarioPublicacion' => $usuarioPublicacion
        ]);
    }


}
