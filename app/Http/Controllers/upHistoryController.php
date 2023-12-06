<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\validaciones\upPublicationValidation;

class upHistoryController extends Controller
{
    public function upHistory(Request $request)
    {
        $claseValidar = new upPublicationValidation();
        $validator = $claseValidar->validarSubir($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $idUsuario = Auth()->user()->id_usuarios;
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $ubicacion = '/images/historias/';
            $rutaArchivo =  $ubicacion . $nombreArchivo;
            $archivo->move(public_path('/images/historias'), $nombreArchivo);
            //DB::select('CALL insertarPublicaciones(?, ?, ?, ?)', array(auth()->user()->id_usuarios, $descripcion, $ubicacion, $nombreArchivo));
            // Otras operaciones si es necesario
            Db::Insert("INSERT INTO historias(contenido, id_usuarios) 
                        VALUES(?,?)", [$rutaArchivo, $idUsuario]);

            return redirect('/');
        } else {
            return redirect()->back()->with('error', 'No se ha seleccionado ningún archivo.');
        }
    }
}
