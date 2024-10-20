<?php

use App\Http\Controllers\FormularioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerapeutaController;
use App\Http\Controllers\ConsultaController;



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
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

