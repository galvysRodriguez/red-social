<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $campo = 'id_usuarios';
    protected $fillable = ['id_publicaciones', 'fecha', 'texto', 'archivo',
            'nombre_cuenta', 'nombre_usuario', 'foto_perfil', 'numComentarios', 'id_usuarios', 'numGustos'];
}
