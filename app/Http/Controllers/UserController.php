<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        /*// Código para llamar a la vista
        $results = DB::select('SELECT * FROM cargarPublicaciones');

        // Mostrar los resultados
        foreach ($results as $result) 
        {
            // Acceder a las propiedades del resultado
            echo $result->id_publicaciones;
        }*/
    }
    
}
