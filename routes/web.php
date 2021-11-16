<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\OfertaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [LoginController::class, 'index'])->middleware('auth', 'verified')->name('home');

Route::get('/registro', [RegistroController::class, 'index']);
// Route::get('/register', [RegistroController::class, 'index']);

Route::get('/usuarios/crear', [UserController::class, 'create'])->middleware('auth', 'verified')->name('trabajador.registro');

Route::post('usuarios/crear', [UserController::class, 'store'])->middleware('auth', 'verified')->name('trabajador.guardar');

Route::get('usuarios/listado', [UserController::class , 'index'])->middleware('auth', 'verified')->name('usuarios.listado');

Route::get('usuarios/{id}', [UserController::class , 'show'])->middleware('auth', 'verified')->name('usuarios.detalle');

Route::get('usuarios/{id}/editar', [UserController::class , 'edit'])->middleware('auth', 'verified')->name('usuarios.editar');
Route::put('usuarios/{id}', [UserController::class , 'update'])->middleware('auth', 'verified')->name('usuarios.actualizar');
Route::put('usuarios/{id}/cambiarcontraseña', [UserController::class , 'updatePassword'])->middleware('auth', 'verified')->name('usuarios.actualizarcontraseña');
Route::put('usuarios/{id}/empresa/editar', [EmpresaController::class , 'update'])->middleware('auth', 'verified')->name('empresas.actualizar');

Route::get('usuarios/{id}/empresa', [EmpresaController::class , 'edit'])->middleware('auth', 'verified')->name('empresas.editar');
Route::delete('usuarios/{id}/eliminar', [UserController::class , 'destroy'])->middleware('auth', 'verified')->name('usuarios.eliminar');

Route::get('programas/listado', [ProgramaController::class , 'index'])->middleware('auth', 'verified')->name('programas.listado');
Route::get('programas/crear', [ProgramaController::class , 'create'])->middleware('auth', 'verified')->name('programas.registro');
Route::post('programas/crear', [ProgramaController::class , 'store'])->middleware('auth', 'verified')->name('programas.guardar');
Route::delete('programas/{id}/eliminar', [ProgramaController::class , 'destroy'])->middleware('auth', 'verified')->name('programas.eliminar');
Route::get('programas/{id}/editar', [ProgramaController::class , 'edit'])->middleware('auth', 'verified')->name('programas.editar');
Route::put('programas/{id}', [ProgramaController::class , 'update'])->middleware('auth', 'verified')->name('programas.actualizar');

Route::get('oferta/listado', [OfertaController::class , 'index'])->middleware('auth', 'verified')->name('ofertas.listado');
Route::get('oferta/crear', [OfertaController::class , 'create'])->middleware('auth', 'verified')->name('ofertas.registro');
Route::post('oferta/crear', [OfertaController::class , 'store'])->middleware('auth', 'verified')->name('ofertas.guardar');
Route::delete('oferta/{id}/eliminar', [OfertaController::class , 'destroy'])->middleware('auth', 'verified')->name('ofertas.eliminar');
Route::get('oferta/{id}/editar', [OfertaController::class , 'edit'])->middleware('auth', 'verified')->name('ofertas.editar');
Route::put('oferta/{id}', [OfertaController::class , 'update'])->middleware('auth', 'verified')->name('ofertas.actualizar');

// Route::get('/home', function () {
//     return view('home');
// })->middleware(['auth', 'verified']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
