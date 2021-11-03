<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UserController;

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

Route::get('/home', [LoginController::class, 'index'])->middleware('auth', 'verified');

Route::get('/registro', [RegistroController::class, 'index']);
// Route::get('/register', [RegistroController::class, 'index']);

Route::get('/usuarios/crear', [UserController::class, 'create'])->middleware('auth', 'verified')->name('trabajador.registro');

Route::post('usuarios/crear', [UserController::class, 'store'])->middleware('auth', 'verified')->name('trabajador.guardar');

Route::get('usuarios/listado', [UserController::class , 'index'])->middleware('auth', 'verified')->name('usuarios.listado');

// Route::get('/home', function () {
//     return view('home');
// })->middleware(['auth', 'verified']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
