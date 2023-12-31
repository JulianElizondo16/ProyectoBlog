<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComentariosController;

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

Route::controller(ComentariosController::class)->group(function(){

    Route::get('/', 'index')->name('comentarios.home');
    
    Route::post('/comentarios', 'GenerarComentario')->name('comentarios.generar');
    
    //muestra el Comentario a detalle
    Route::get('/comentarios/{comentario}', 'show')->name('comentarios.show');
});















Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
