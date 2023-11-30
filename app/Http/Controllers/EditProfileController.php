<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EditProfileController extends Controller
{
    public function showEditProfile(){
        $usuario = auth()->user();
        return view('editProfile', compact('usuario'));
    }

    public function editProfile(Request $request){
            $archivo = $request->file('archivo');
            $nombre_cuenta = $request->input('nombre_cuenta');
            $nombre_usuario = $request->input('nombre_usuario');
            $descripcion = $request->input('descripcion');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $ubicacion = '/images/fotos de perfil/';
            $rutaArchivo =  $ubicacion . $nombreArchivo;
            $archivo->move(public_path('/images/fotos de perfil'), $nombreArchivo);
            $resultado = 0;
            DB::select('CALL EditarPerfil(?, ?, ?, ?, @resultado, ?, ?)', array($nombre_usuario, $nombre_cuenta, $nombreArchivo, $descripcion, 
                                                                             $ubicacion, auth()->user()->id_usuarios));
            return redirect('/profile');
       
    }
}
