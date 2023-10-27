<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $fillable = ['id_publicaciones', 'fecha', 'texto', 'archivo'];
}
