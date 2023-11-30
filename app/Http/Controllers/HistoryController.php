<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function showHistory(){
        $historias = DB::table('cargarhistorias')->get();

        return view('probando', compact('historias'));
    }

    public function showHistoryProfile(Request $request){
        $parametro = $request->input('parametro');
        $historias = DB::table('cargarhistorias')
        ->where('id_usuarios',$parametro)->get();

        // Enviar una respuesta con los datos de la consulta
        return response()->json(['historias' => $historias]);
    }
}
