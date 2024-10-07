<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerapeutaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Ruta para la vista de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Ruta para mostrar el formulario de creación de terapeutas
Route::get('/terapeutas/crear', [TerapeutaController::class, 'create'])->name('terapeutas.create');

// Ruta para manejar el envío del formulario y almacenar los datos
Route::post('/terapeutas', [TerapeutaController::class, 'store'])->name('terapeutas.store');


// Ruta para mostrar el formulario de edición de un terapeuta
Route::get('/terapeutas/{id}/editar', [TerapeutaController::class, 'edit'])->name('terapeutas.edit');

// Ruta para manejar la actualización de los datos del terapeuta
Route::put('/terapeutas/{id}', [TerapeutaController::class, 'update'])->name('terapeutas.update');

// Ruta para eliminar un terapeuta
Route::delete('/terapeutas/{id}', [TerapeutaController::class, 'destroy'])->name('terapeutas.destroy');


// Ruta para listar los terapeutas
Route::get('/terapeutas', [TerapeutaController::class, 'index'])->name('terapeutas.index');
