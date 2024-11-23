<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerapeutaController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\FormularioController;

use App\Http\Controllers\ReporteController;


use App\Http\Controllers\RecursoController;




// Ruta para la vista de bienvenida

use App\Http\Controllers\MailTestController;

use App\Http\Controllers\FileController;
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
Route::get('/', function () {
    return view('welcome');


});

/*TERAPEUTAS VIEWS*/
Route::resource('terapeutas', TerapeutaController::class);


/*FORMULARIOS VIEWS*/
Route::resource('formularios', FormularioController::class)->parameters(['formularios' => 'formulario']);

/*CONSULTAS VIEWS*/
Route::resource('consultas', ConsultaController::class);

Route::middleware([
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Ruta del dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /* TERAPEUTAS VIEWS */
    Route::resource('terapeutas', TerapeutaController::class);

    /* FORMULARIOS VIEWS */
    Route::resource('formularios', FormularioController::class)->parameters(['formularios' => 'formulario']);

    /* CONSULTAS VIEWS */
    Route::resource('consultas', ConsultaController::class);

    Route::get('/test-email', [MailTestController::class, 'sendTestEmail']);

});

use App\Http\Controllers\AvisoController;

Route::get('/avisos/enviar', [AvisoController::class, 'index'])->name('avisos.index');
Route::post('/avisos/enviar', [AvisoController::class, 'enviarAvisoGeneral'])->name('enviar.aviso.general');
Route::get('/files', [FileController::class, 'index'])->name('files.index');
Route::delete('/files/{id}', [FileController::class, 'destroy'])->name('files.destroy');
Route::post('/files/clean-orphans', [FileController::class, 'cleanOrphans'])->name('files.clean-orphans');
Route::resource('reportes', ReporteController::class);
Route::resource('recursos', RecursoController::class);