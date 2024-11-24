<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestasFormulario extends Model
{
    use HasFactory;

    protected $table = 'respuestas_formularios';

    protected $fillable = [
        'user_id',
        'formulario_id',
        'respuestas',
        'fecha',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formulario()
    {
        return $this->belongsTo(Formulario::class);
    }
}
