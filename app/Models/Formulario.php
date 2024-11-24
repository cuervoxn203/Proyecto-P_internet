<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formulario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nombre', 'preguntas', 'descripcion'];

    public function respuestasFormulario()
    {
        return $this->hasMany(RespuestasFormulario::class);
    }
}
