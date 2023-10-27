<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Publicacion;

class PublicacionController extends Controller
{
    public function index()
    {
        $publicaciones = DB::table('cargarpublicaciones')->get();
        return view('index', ['publicaciones' => $publicaciones ]);
    }

    
}
