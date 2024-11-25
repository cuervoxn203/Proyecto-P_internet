<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Consulta.php
class Consulta extends Model
{
    use HasFactory;

    protected $fillable = ['paciente_id', 'descripcion', 'fecha_hora', 'terapeuta_id'];

    public function paciente()
    {
        return $this->belongsTo(User::class, 'paciente_id');
    }

    // Relación con el modelo Terapeuta (muchos a 1)
    public function terapeuta()
    {
        return $this->belongsTo(Terapeuta::class);
    }
}
