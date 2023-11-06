<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Publicacion;
use Illuminate\Support\Facades\Auth;

class UpPublicationController extends Controller
{
    public function upPublication(Request $request){
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $descripcion = $request->input('descripcion');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $ubicacion = '/images/publicacion/';
            $rutaArchivo =  $ubicacion . $nombreArchivo;
            $archivo->move(public_path('/images/publicacion'), $nombreArchivo);
            DB::select('CALL insertarPublicaciones(?, ?, ?, ?)', array(auth()->user()->id_usuarios, $descripcion, $ubicacion, $nombreArchivo));
            // Otras operaciones si es necesario
    
            return redirect('/');
        } else {
            return redirect()->back()->with('error', 'No se ha seleccionado ningún archivo.');
        }
    }

    public function showUpPublication(){
        return view('upPublication');
    }
}
