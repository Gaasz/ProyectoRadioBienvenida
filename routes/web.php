<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\PdfController;
use App\Models\User;
use App\Models\Cotizacion;
use App\Models\Empresa;




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

// Route::get('/', [LoginController::class, 'actions']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [LoginController::class, 'index'])->middleware('auth')->name('home');

Route::get('/registro', [RegistroController::class, 'index']);
// Route::get('/register', [RegistroController::class, 'index']);

Route::get('/usuarios/crear', [UserController::class, 'create'])->middleware('auth','admin')->name('trabajador.registro');

Route::post('usuarios/crear', [UserController::class, 'store'])->middleware('auth', 'admin')->name('trabajador.guardar');

Route::get('usuarios/listado', [UserController::class , 'index'])->middleware('auth','adminworker')->name('usuarios.listado');

Route::get('usuarios/{id}', [UserController::class , 'show'])->middleware('auth','thisuser')->name('usuarios.detalle');

Route::get('usuarios/{id}/editar', [UserController::class , 'edit'])->middleware('auth', 'thisuser')->name('usuarios.editar');
Route::put('usuarios/{id}', [UserController::class , 'update'])->middleware('auth', 'thisuser')->name('usuarios.actualizar');
Route::put('usuarios/{id}/cambiarcontraseña', [UserController::class , 'updatePassword'])->middleware('auth', 'thisuser')->name('usuarios.actualizarcontraseña');
Route::put('usuarios/{id}/empresa/editar', [EmpresaController::class , 'update'])->middleware('auth' , 'thisuser')->name('empresas.actualizar');

Route::get('usuarios/{id}/empresa', [EmpresaController::class , 'edit'])->middleware('auth')->name('empresas.editar');
Route::delete('usuarios/{id}/eliminar', [UserController::class , 'destroy'])->middleware('auth')->name('usuarios.eliminar');

Route::get('programas/listado', [ProgramaController::class , 'index'])->middleware('auth')->name('programas.listado');
Route::get('programas/crear', [ProgramaController::class , 'create'])->middleware('auth', 'admin')->name('programas.registro');
Route::post('programas/crear', [ProgramaController::class , 'store'])->middleware('auth','admin')->name('programas.guardar');
Route::get('programas/{id}/editar', [ProgramaController::class , 'edit'])->middleware('auth', 'admin')->name('programas.editar');
Route::put('programas/{id}', [ProgramaController::class , 'update'])->middleware('auth','admin')->name('programas.actualizar');
Route::delete('programas/{id}/eliminar', [ProgramaController::class , 'destroy'])->middleware('auth','admin')->name('programas.eliminar');

Route::get('ofertas/listado', [OfertaController::class , 'index'])->middleware('auth','adminworker')->name('ofertas.listado');
Route::get('ofertas/crear', [OfertaController::class , 'create'])->middleware('auth', 'admin')->name('ofertas.registro');
Route::post('ofertas/crear', [OfertaController::class , 'store'])->middleware('auth','admin')->name('ofertas.guardar');
Route::delete('ofertas/{id}/eliminar', [OfertaController::class , 'destroy'])->middleware('auth','admin')->name('ofertas.eliminar');


Route::get('cotizaciones/crear', [CotizacionController::class , 'create'])->middleware('auth', 'user')->name('cotizaciones.registro');
Route::post('cotizaciones/crear', [CotizacionController::class , 'store'])->middleware('auth', 'user')->name('cotizaciones.guardar');
Route::get('cotizaciones/responder/{id}', [CotizacionController::class , 'create2'])->middleware('auth')->name('cotizaciones.responder');
Route::post('cotizaciones/responder/{id}', [CotizacionController::class , 'store2'])->middleware('auth')->name('cotizaciones.guardar2');
Route::get('cotizaciones/listado', [CotizacionController::class , 'index'])->middleware('auth')->name('cotizaciones.listado');


Route::get('pdf/{id}', [PdfController::class , 'showPdf'])->middleware('auth', 'adminworker')->name('pdf.mostrar');


    
    
    




// Route::get('/home', function () {
//     return view('home');
// })->middleware(['auth', 'verified']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
