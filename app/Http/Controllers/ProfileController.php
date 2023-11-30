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
        $numSeguidores = 0;
        $numSeguidos = 0;
        $numPublicaciones = 0;
        $valSeguido = 0;

        //$publicaciones = DB::table('cargarpublicaciones')->get();
        $publicaciones = DB::table('cargarpublicaciones')->where('id_usuarios', '=', auth()->user()->id_usuarios)->get();
        DB::select('CALL informacionPerfil(?, @numSeguidores, @numPublicaciones, @numSeguidos, @valSeguido, ?)', array(auth()->user()->id_usuarios, auth()->user()->id_usuarios));
        $numSeguidores = DB::select('SELECT @numSeguidores as numSeguidores')[0]->numSeguidores;
        $numSeguidos = DB::select('SELECT @numSeguidos as numSeguidos')[0]->numSeguidos;
        $numPublicaciones = DB::select('SELECT @numPublicaciones as numPublicaciones')[0]->numPublicaciones;
        $valSeguido = DB::select('SELECT @valSeguido as valSeguido')[0]->valSeguido;

        return view('profile', [
            'usuario' => auth()->user(),
            'publicaciones' => $publicaciones,
            'numSeguidores' => $numSeguidores,
            'numPublicaciones' => $numPublicaciones,
            'numSeguidos' => $numSeguidos
            ]);
    }

    public function showProfileOther($idEncriptado)
    {
        //$idDesencriptado = Crypt::decryptString($idEncriptado);
        if(auth()->user()) {
            if(auth()->user()->id_usuarios == $idEncriptado) {
                return redirect('/profile');
            }
            $idUsuario = auth()->user()->id_usuarios;
        }
        else{
            $idUsuario = 0;
        }

        $numSeguidores = 0;
        $numSeguidos = 0;
        $numPublicaciones = 0;
        $valSeguido = 0;

        $publicaciones = DB::table('cargarpublicaciones')->where('id_usuarios', '=', $idEncriptado)->get();
        $usuario = User::find($idEncriptado);
        DB::select('CALL informacionPerfil(?, @numSeguidores, @numPublicaciones, @numSeguidos, @valSeguido, ?)', array($idEncriptado, $idUsuario));
        $numSeguidores = DB::select('SELECT @numSeguidores as numSeguidores')[0]->numSeguidores;
        $numSeguidos = DB::select('SELECT @numSeguidos as numSeguidos')[0]->numSeguidos;
        $numPublicaciones = DB::select('SELECT @numPublicaciones as numPublicaciones')[0]->numPublicaciones;
        $valSeguido = DB::select('SELECT @valSeguido as valSeguido')[0]->valSeguido;


        return view('profileUser', [
            'usuario' => $usuario,
            'publicaciones' => $publicaciones,
            'numSeguidores' => $numSeguidores,
            'numPublicaciones' => $numPublicaciones,
            'numSeguidos' => $numSeguidos, 
            'valSeguido'=> $valSeguido
            ]);
    }

}
