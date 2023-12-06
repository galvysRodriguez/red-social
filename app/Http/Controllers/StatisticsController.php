<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
    public function showStatistics()
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
        return view('premium/statistics', compact('usuarios2'));
    }

    public function statisticsSolicity(Request $request)
    {
        $id = Auth::user()->id_usuarios;
        $valor = db::select("SELECT COUNT(*) as total FROM gustos g 
                            INNER JOIN publicaciones p on p.id_publicaciones = g.id_acciones
                            INNER JOIN usuarios u on  u.id_usuarios = p.id_usuario
                            WHERE u.id_usuarios = '$id'
                            GROUP by p.id_publicaciones
                            ORDER BY p.fecha DESC ");

        $resultado =  $valor[0]->total;

        return response()->json([
            'success' => true,
            'data' => $resultado,
        ]);
    }
}
