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
<<<<<<< HEAD

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
=======
>>>>>>> 9594cb604ad9d9b423681a39404522ad72d1b395
}
