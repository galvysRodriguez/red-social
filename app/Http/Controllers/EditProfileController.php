<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\validaciones\editProfileValidation;

class EditProfileController extends Controller
{
    public function showEditProfile()
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
        $usuario = auth()->user();
        if (session('espremium')) {
            return view('premium/editProfile-premium', compact('usuario', 'usuarios2'));
        }
        return view('editProfile', compact('usuario', 'usuarios2'));
    }

    public function editProfile(Request $request)
    {
        $claseValidar = new editProfileValidation();
        $validator = $claseValidar->validarEditarPerfil($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $archivo = $request->file('archivo');
        $nombre_cuenta = $request->input('nombre_cuenta');
        $nombre_usuario = $request->input('nombre_usuario');
        $descripcion = $request->input('descripcion');
        $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
        $ubicacion = '/images/fotos de perfil/';
        $rutaArchivo =  $ubicacion . $nombreArchivo;
        $archivo->move(public_path('/images/fotos de perfil'), $nombreArchivo);
        $id = auth()->user()->id_usuarios;
        Db::Update("UPDATE  usuarios SET nombre_cuenta = ?,
                    nombre_usuario = ?, foto_perfil = ?, descripcion = ?
                    WHERE id_usuarios = ?", [$nombre_cuenta, $nombre_usuario, $rutaArchivo, $descripcion, $id]);
        return redirect('/profile');

    }
}
