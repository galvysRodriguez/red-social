<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ConvertPremiumController extends Controller
{
    public function convertPremium(Request $request)
    {
        $id_usuario = Auth()->user()->id_usuarios;
        DB::insert(
            "INSERT INTO suscripciones(id_usuarios) 
        VALUES (?)",
            [$id_usuario]
        );

        session(['espremium' => true]);
        return redirect('/');

    }
}
