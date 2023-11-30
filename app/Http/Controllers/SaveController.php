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
        $publicaciones = DB::table('cargarpublicaciones')
        ->join('guardados', 'cargarpublicaciones.id_publicaciones', '=', 'guardados.id_acciones')
        ->where('guardados.id_usuarios', Auth()->user()->id_usuarios)
        ->get();
        return view('saves', ['publicaciones' => $publicaciones ]);
    }

    public function saves(Request $request)
    {
        $id_usuario = Auth()->user()->id_usuarios;
        $id_publicacion = $request->input('id_publicacion2');
        DB::select('CALL darGuardado(?, ?)', array($id_usuario, $id_publicacion));
        return redirect()->back();
    }
}
