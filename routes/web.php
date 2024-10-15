<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerapeutaController;
use App\Http\Controllers\FormularioController;



// Ruta para la vista de bienvenida
Route::get('/', function () {
    return view('welcome');
});

Route::resource('terapeutas', TerapeutaController::class);



// Grupo de rutas protegidas por middleware de autenticación (Opcional)
// Rutas de TerapeutaController
Route::get('/terapeutas/create', [TerapeutaController::class, 'create'])->name('terapeutas.create');
Route::post('/terapeutas', [TerapeutaController::class, 'store'])->name('terapeutas.store');
Route::get('/terapeutas/{id}/editar', [TerapeutaController::class, 'edit'])->name('terapeutas.edit');
Route::put('/terapeutas/{id}', [TerapeutaController::class, 'update'])->name('terapeutas.update');
Route::delete('/terapeutas/{id}', [TerapeutaController::class, 'destroy'])->name('terapeutas.destroy');
Route::get('/terapeutas', [TerapeutaController::class, 'index'])->name('terapeutas.index');



// Correcto: Rutas Resource fuera de cualquier grupo con middleware de autenticación
Route::resource('terapeutas', TerapeutaController::class)->parameters([
    'terapeutas' => 'terapeuta'
]);
