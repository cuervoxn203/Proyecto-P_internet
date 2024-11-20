<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerapeutaController;
use App\Http\Controllers\FormularioController;



// Ruta para la vista de bienvenida
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\MailTestController;
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

// Ruta pública
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
/* RUTAS PROTEGIDAS */
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



