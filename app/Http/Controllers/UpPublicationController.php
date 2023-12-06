<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Publicacion;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\validaciones\upPublicationValidation;

class UpPublicationController extends Controller
{
    public function upPublication(Request $request)
    {
        $claseValidar = new upPublicationValidation();
        $validator = $claseValidar->validarSubir($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $idUsuario = Auth()->user()->id_usuarios;
            $descripcion = $request->input('descripcion');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $ubicacion = '/images/publicaciones/';
            $rutaArchivo =  $ubicacion . $nombreArchivo;
            $archivo->move(public_path('/images/publicaciones'), $nombreArchivo);
            //DB::select('CALL insertarPublicaciones(?, ?, ?, ?)', array(auth()->user()->id_usuarios, $descripcion, $ubicacion, $nombreArchivo));
            // Otras operaciones si es necesario
            Db::Insert("INSERT INTO publicaciones(contenido, descripcion, id_usuarios) 
                        VALUES(?,?,?)", [$rutaArchivo, $descripcion, $idUsuario]);

            return redirect('/');
        } else {
            return redirect()->back()->with('error', 'No se ha seleccionado ningún archivo.');
        }
    }

    public function showUpPublication()
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
            return view('premium/upPublication-premium', compact('usuarios2'));
        }
        return view('upPublication', compact('usuarios2'));
    }
}
