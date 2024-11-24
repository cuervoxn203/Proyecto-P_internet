<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Consulta.php
class Consulta extends Model
{
    use HasFactory;

    protected $fillable = ['paciente', 'descripcion', 'fecha_hora', 'terapeuta_id'];

    // Relación con el modelo Terapeuta (muchos a 1)
    public function terapeuta()
    {
        return $this->belongsTo(Terapeuta::class);
    }
}
