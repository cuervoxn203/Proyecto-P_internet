<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terapeuta extends Model
{
    use HasFactory;

    // Permitir la asignación masiva de estos campos
    protected $fillable = [
        'nombre', 
        'email', 
        'especialidad', 
        'telefono',
    ];

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}
