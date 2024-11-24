<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'tipo',
        'url',
        'categoria',
        'fecha_creacion',
    ];

    public function usuarioRecurso()
    {
        return $this->hasMany(UsuarioRecurso::class);
    }
}
