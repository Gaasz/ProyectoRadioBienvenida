<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpresaController;

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
Route::put('usuarios/{id}/empresa/editar', [EmpresaController::class , 'update'])->middleware('auth', 'verified')->name('empresa.actualizar');

Route::get('usuarios/{id}/empresa', [EmpresaController::class , 'edit'])->middleware('auth', 'verified')->name('empresa.editar');

// Route::get('/home', function () {
//     return view('home');
// })->middleware(['auth', 'verified']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
