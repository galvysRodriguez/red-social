<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class FollowController extends Controller
{
    public function follows(Request $request){
        $id_usuario = $request->input('id_usuario_personal');
        $id_seguido = $request->input('id_usuario22');
        DB::select('CALL darSeguir(?, ?)', array($id_usuario, $id_seguido));
        return redirect()->back();
        
    }

    public function showFollow(){
        if( Auth()->user()){
            $id_usuario = Auth()->user()->id_usuarios;
        }
        else{
            $id_usuario = 0;
        }
        $mensaje = "Usuarios de interes";
        $usuarios = DB::table('usuarios_vistas')->whereNot('usuarios_vistas.id_usuarios', $id_usuario)->paginate(12);
        return view('followers', compact('usuarios', 'mensaje'));
    }
}
