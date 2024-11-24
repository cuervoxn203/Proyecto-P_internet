<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\AvisoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\MailTestController;
use App\Http\Controllers\RecursoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RespuestasFormularioController;
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

// Welcome view
Route::get('/', function () {
    return view('welcome');
});

/* Public Routes */
// Resource routes
Route::resource('terapeutas', TerapeutaController::class);
Route::resource('formularios', FormularioController::class)->parameters(['formularios' => 'formulario']);
Route::resource('consultas', ConsultaController::class);
Route::resource('respuestas_formularios', RespuestasFormularioController::class);
Route::resource('reportes', ReporteController::class);
Route::resource('recursos', RecursoController::class);

// File management routes
Route::get('/files', [FileController::class, 'index'])->name('files.index');
Route::delete('/files/{id}', [FileController::class, 'destroy'])->name('files.destroy');
Route::post('/files/clean-orphans', [FileController::class, 'cleanOrphans'])->name('files.clean-orphans');

// Archivo routes
Route::get('/archivos', [ArchivoController::class, 'index'])->name('archivos.index');
Route::post('/archivos/subir', [ArchivoController::class, 'subir'])->name('archivos.subir');
Route::get('/archivos/descargar/{id}', [ArchivoController::class, 'descargar'])->name('archivos.descargar');
Route::delete('/archivos/eliminar/{id}', [ArchivoController::class, 'eliminar'])->name('archivos.eliminar');

// Aviso routes
Route::get('/avisos/enviar', [AvisoController::class, 'index'])->name('avisos.index');
Route::post('/avisos/enviar', [AvisoController::class, 'enviarAvisoGeneral'])->name('enviar.aviso.general');

Route::middleware([
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('terapeutas', TerapeutaController::class);
    Route::resource('formularios', FormularioController::class)->parameters(['formularios' => 'formulario']);
    Route::resource('consultas', ConsultaController::class);

    Route::get('/test-email', [MailTestController::class, 'sendTestEmail']);
});
