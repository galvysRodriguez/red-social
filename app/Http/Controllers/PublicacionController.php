<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Publicacion;
use Illuminate\Support\Facades\Auth;

class PublicacionController extends Controller
{
    public function index()
    {
       
        $publicaciones = DB::table('cargarpublicaciones')->get();
        $historias = DB::table('cargarhistorias')->get();
        if(auth()->user()) {
            $id_usuario = Auth()->user()->id_usuarios;
            $usuarioshistorias = DB::table('usuarioshistorias')
            ->whereNot('usuarioshistorias.id_usuarios', $id_usuario)->get();
            $mishistorias = DB::table('usuarioshistorias')
            ->where('usuarioshistorias.id_usuarios', $id_usuario)->get();
            
        }
        else{
            $usuarioshistorias = DB::table('usuarioshistorias')->get();
            $mishistorias = null;
        }
       
        return view('index', compact('historias', 'publicaciones', 'usuarioshistorias', 'mishistorias'));
    }

    public function showLikes(Request $request){
        $datosJson = $request->json()->all();
        // Accede a valores específicos
        $id_publicacion = $datosJson['publicacion'];
        if(auth()->user()) {
            $id_usuario = Auth()->user()->id_usuarios;
        }
        else{
            $id_usuario = 0;
        }
            
        DB::select('CALL infoPublicacion(?, ?, @megusta, @guardado)', array($id_usuario, $id_publicacion));
        $megusta = DB::select('SELECT @megusta as megusta')[0]->megusta;
        $guardado = DB::select('SELECT @guardado as guardado')[0]->guardado;
        return response()->json([
            'megusta' => $megusta,
            'guardado' => $guardado,
        ]);
    }


}
