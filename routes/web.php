<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerapeutaController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\ProfesionalController;



// Ruta para la vista de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas Resource para Terapeutas
Route::resource('terapeutas', TerapeutaController::class)->parameters([
    'terapeutas' => 'terapeuta'
]);


// Grupo de rutas protegidas por middleware de autenticación (Opcional)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
