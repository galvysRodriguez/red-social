<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Publicacion;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $idUsuario = auth()->user()->id_usuarios;
        $publicaciones = Db::SELECT("SELECT * FROM publicaciones
                                    WHERE id_usuarios = '$idUsuario'");
        $numSeguidores = Db::SELECT("SELECT COUNT(*) as count FROM seguidores
                                    WHERE id_seguido = '$idUsuario'");
        $numSeguidos = Db::SELECT("SELECT COUNT(*) as count FROM seguidores
                                    WHERE id_sigue = '$idUsuario'");
        $numPublicaciones = Db::SELECT("SELECT COUNT(*) as count FROM publicaciones
                                    WHERE id_usuarios = '$idUsuario'");
        $usuarios2 = DB::SELECT("SELECT u1.id_usuarios, u1.nombre_cuenta, u1.foto_perfil FROM usuarios u1
         WHERE not (u1.id_usuarios in (
             SELECT s.id_seguido FROM seguidores s
             WHERE s.id_sigue = '$idUsuario' and s.id_seguido = u1.id_usuarios) or 
             u1.id_usuarios = '$idUsuario')
             group by u1.id_usuarios, u1.nombre_cuenta, u1.foto_perfil
             LIMIT 4");

        if (session('espremium')) {
            return view('premium/profile-premium', [
                'usuario' => auth()->user(),
                'publicaciones' => $publicaciones,
                'numSeguidores' => $numSeguidores[0]->count,
                'numPublicaciones' => $numPublicaciones[0]->count,
                'numSeguidos' => $numSeguidos[0]->count,
                'usuarios2' => $usuarios2
                ]);
        }

        return view('profile', [
            'usuario' => auth()->user(),
            'publicaciones' => $publicaciones,
            'numSeguidores' => $numSeguidores[0]->count,
            'numPublicaciones' => $numPublicaciones[0]->count,
            'numSeguidos' => $numSeguidos[0]->count,
            'usuarios2' => $usuarios2
            ]);
    }

    public function showProfileOther($id)
    {
        
        if(auth()->user()) {
            if(auth()->user()->id_usuarios == $id) {
                return redirect('/profile');
            }
            $idUsuario = auth()->user()->id_usuarios;
        } else {
            $idUsuario = 0;
        }

        $usuario = User::find($id);
        $publicaciones = Db::SELECT("SELECT * FROM publicaciones
                                    WHERE id_usuarios = '$id'");
        $numSeguidores = Db::SELECT("SELECT COUNT(*) as count FROM seguidores
                                    WHERE id_seguido = '$id'");
        $numSeguidos = Db::SELECT("SELECT COUNT(*) as count FROM seguidores
                                    WHERE id_sigue = '$id'");
        $numPublicaciones = Db::SELECT("SELECT COUNT(*) as count FROM publicaciones
                                    WHERE id_usuarios = '$id'");
        $valSeguido = Db::SELECT("SELECT COUNT(*) as count FROM seguidores
                                    WHERE id_seguido = '$id' and id_sigue = '$idUsuario'");
        $usuarios2 = DB::SELECT("SELECT u1.id_usuarios, u1.nombre_cuenta, u1.foto_perfil FROM usuarios u1
        WHERE not (u1.id_usuarios in (
            SELECT s.id_seguido FROM seguidores s
            WHERE s.id_sigue = '$idUsuario' and s.id_seguido = u1.id_usuarios) or 
            u1.id_usuarios = '$idUsuario')
            group by u1.id_usuarios, u1.nombre_cuenta, u1.foto_perfil
            LIMIT 4");

        if (session('espremium')) {
            return view('premium/profileUser-premium', [
                'usuario' => $usuario,
                'publicaciones' => $publicaciones,
                'numSeguidores' => $numSeguidores[0]->count,
                'numPublicaciones' => $numPublicaciones[0]->count,
                'numSeguidos' => $numSeguidos[0]->count,
                'valSeguido' => $valSeguido[0]->count,
                'usuarios2' => $usuarios2
            ]);
        }


        return view('profileUser', [
            'usuario' => $usuario,
            'publicaciones' => $publicaciones,
            'numSeguidores' => $numSeguidores[0]->count,
            'numPublicaciones' => $numPublicaciones[0]->count,
            'numSeguidos' => $numSeguidos[0]->count,
            'valSeguido' => $valSeguido[0]->count,
            'usuarios2' => $usuarios2
            ]);
    }

}
