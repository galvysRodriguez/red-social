<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function likes(Request $request)
    {
        $id_usuario = Auth()->user()->id_usuarios;
        $id_publicacion = $request->input('id_publicacion');
        DB::select('CALL darMeGusta(?, ?)', array($id_usuario, $id_publicacion));
        return redirect()->back();
    }
}
