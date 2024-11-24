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
use App\Http\Controllers\UsuarioRecursoController;
use Illuminate\Support\Facades\Auth;

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
Route::resource('usuario_recursos', UsuarioRecursoController::class);

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
        $user = Auth::user();
        $reportes_recientes = $user->reportes->filter(function ($reporte) {
            return $reporte->created_at >= now()->subDays(7);
        });
        $respuestas_recientes = $user->respuestasFormulario->filter(function ($respuesta) {
            return $respuesta->created_at >= now()->subDays(7);
        });
        return view('dashboard', compact('reportes_recientes', 'respuestas_recientes'));
    })->name('dashboard');

    Route::resource('terapeutas', TerapeutaController::class);
    Route::resource('formularios', FormularioController::class)->parameters(['formularios' => 'formulario']);
    Route::resource('consultas', ConsultaController::class);

    Route::get('/test-email', [MailTestController::class, 'sendTestEmail']);
});
