<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;
    protected $fillable = ['id_historias', 'inicio', 'cierre', 'archivo', 'nombre_cuenta', 'nombre_usuario', 'foto_perfil', 'id_usuarios'];
}
