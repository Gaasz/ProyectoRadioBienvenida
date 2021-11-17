<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ofertas = Oferta::all();
        return view('ofertas.index', compact('ofertas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ofertas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        
       if($request->tipoOferta==1){
           
            $validacion = Validator::make($request->all(), [
                'nombreOferta' => 'required',
                'descripcion' => 'required',
                'valor' => 'required',
                'cantidad' => 'required',
                'fechaInicio' => 'required',
                'fechaFin' => 'required',
                ]);
                if ($validacion->fails()) {
                    return redirect()->back()->withErrors($validacion)->withInput()->with('oferta','ok');
                }
            
                
            }
            if($request->tipoOferta==2){
              

                $validacion = Validator::make($request->all(), [
                    'nombreOferta' => 'required',
                    'descripcion' => 'required',
                    'descuento' => 'required',
                    'fechaInicio' => 'required',
                    'fechaFin' => 'required',
                ]);

                if ($validacion->fails()) {
                    return redirect()->back()->withErrors($validacion)->withInput()->with('descuento','ok');
                }
            }
            // }else{
            //     $request->validate([
            //         'nombreOferta' => 'required',
            //         'descripcion' => 'required',
            //         'tipoOferta'=> 'required',
            //         'descripcion' => 'required',
            //     ]);
            // }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function show(Oferta $oferta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function edit(Oferta $oferta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oferta $oferta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oferta $oferta)
    {
        //
    }
}
