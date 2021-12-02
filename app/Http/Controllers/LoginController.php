<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotizacion;
use App\Models\User;
use App\Models\Oferta;



class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->get('rol')==3){
            $cotizaciones = Cotizacion::where('empresa_id', session()->get('id_empresa'))->count();
            $tablaCotizaciones = Cotizacion::where('empresa_id', session()->get('id_empresa'))->get();
        }else{
            $cotizaciones = Cotizacion::count();
            $tablaCotizaciones = Cotizacion::take(5)->get();
        }
        $usuarios = User::latest()->with('empresa')->take(5)->get();
        $oferta = Oferta::first();
        
        $ofertaPrecio = number_format($oferta->valor, 0, ',', '.');
        
        // return $usuarios;
<<<<<<< HEAD
        return view('home', compact('cotizaciones', 'usuarios','oferta', 'tablaCotizaciones', 'ofertaPrecio'));
=======
        return view('home', compact('cotizaciones', 'usuarios','oferta', 'tablaCotizaciones'));
>>>>>>> 01fa2ca914a289a145b5ee0fc2b793feaecc94a0
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function actions()
    {
        return view('auth.login');
    }
}
