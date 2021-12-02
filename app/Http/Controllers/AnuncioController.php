<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->get('rol')==3){
            $id_empresa = session('id_empresa');
            $anuncios = Anuncio::join('cotizaciones','anuncios.cotizacion_id','=','cotizaciones.id_cotizacion',)
            ->join('empresas','cotizaciones.empresa_id','=','empresas.id_empresa')
            ->where('empresas.id_empresa',$id_empresa)
                    // ->join('empresas','empresas.id_empresa','cotizaciones.empresa_id')
                    
                    // ->where('empresas.id_empresa','cotizaciones.empresa_id')
                    // ->where('cotizaciones.id_cotizacion','anuncios.cotizacion_id')
                    // ->where('empresas.id_empresa', $id_empresa)
                    ->select('anuncios.*','empresas.nombre_empresa','cotizaciones.*')
                    ->get();

            return view('anuncios.index', compact('anuncios'));
        }else{
            $anuncios = Anuncio::join('cotizaciones','anuncios.cotizacion_id','=','cotizaciones.id_cotizacion',)
            ->join('empresas','cotizaciones.empresa_id','=','empresas.id_empresa')
            ->select('anuncios.*','empresas.nombre_empresa','cotizaciones.*')
            ->get();
            return view('anuncios.index', compact('anuncios'));
        }
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
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function show(Anuncio $anuncio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function edit(Anuncio $anuncio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anuncio $anuncio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anuncio $anuncio)
    {
        //
    }
}
