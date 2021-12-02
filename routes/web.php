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
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\DOMPDFContoller;
use App\Http\Controllers\RubroEmpresaController;
use App\Models\Oferta;
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
    //if user is auth return to home else return to login 
    if(auth()->check()){
        if(session()->get('rol')==3){
            $cotizaciones = Cotizacion::where('empresa_id', session()->get('id_empresa'))->count();
            $tablaCotizaciones = Cotizacion::where('empresa_id', session()->get('id_empresa'))->get();
        }else{
            $cotizaciones = Cotizacion::count();
            $tablaCotizaciones = Cotizacion::take(5)->get();
        }
        $usuarios = User::latest()->with('empresa')->take(5)->get();
        $oferta = Oferta::first();
        $oferta = $oferta->valor;
        
        // return $usuarios;
        return redirect('/home');
    }else{
        return redirect('/login');
    }
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


Route::get('anuncios/listado', [AnuncioController::class , 'index'])->middleware('auth')->name('anuncios.listado');


Route::get('pdf/{id}', [PdfController::class , 'showPdf'])->middleware('auth', 'adminworker')->name('pdf.mostrar');
Route::get('archivo/{id}', [ArchivoController::class , 'descargar'])->middleware('auth', 'adminworker')->name('archivo.descargar');

Route::get('pdf/{id}', [DOMPDFContoller::class , 'PDF'])->name('pdf');
Route::get('pdf2/{id}', [DOMPDFContoller::class , 'mostrarPDF'])->name('pdf2');

Route::get('rubros/listado', [RubroEmpresaController::class , 'index'])->middleware('auth', 'admin')->name('rubros.listado');
Route::get('rubros/crear', [RubroEmpresaController::class , 'create'])->middleware('auth', 'admin')->name('rubros.registro');
Route::post('rubros/crear', [RubroEmpresaController::class , 'store'])->middleware('auth','admin')->name('rubros.guardar');
Route::delete('rubros/eliminar', [RubroEmpresaController::class , 'destroy'])->middleware('auth','admin')->name('rubros.eliminar');

    
    
    




// Route::get('/home', function () {
//     return view('home');
// })->middleware(['auth', 'verified']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
