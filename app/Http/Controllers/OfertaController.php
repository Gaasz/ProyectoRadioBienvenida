<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Storage;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get ofertas with estatus_oferta
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
        $normal = Oferta::findOrFail(1);
        return view('ofertas.create', compact('normal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
         $validacion = Validator::make($request->all(), [
             'nombreOferta' => 'required|string|min:5|max:100',
             'descripcion' => 'required',
             'valor' => 'required|min:1',
             'fechaInicio' => 'required',
             'fechaFin' => 'required|different:fechaInicio',
             ]);

             if ($validacion->fails()) {
                 return redirect()->back()->withErrors($validacion)->withInput();
             }

        //convert string fechaInicio to date object
        $fechaInicio = date_create($request->fechaInicio);
        $fechaInicio = date_format($fechaInicio, 'Y-m-d');

        $fechaFin = date_create($request->fechaFin);
        $fechaFin = date_format($fechaFin, 'Y-m-d');

        
        
            $ofertas = Oferta::all();
            $normal = Oferta::first();
            foreach ($ofertas as $oferta) {
                
              if($oferta->id != $normal->id){
                
               
                //oferta nueva parte antes de oferta vieja pero termina antes de oferta vieja
                if(($fechaInicio<=$oferta->fecha_inicio) && ($fechaInicio<=$oferta->fecha_fin) && ($fechaFin<= $oferta->fecha_fin) && ($fechaFin >= $oferta->fecha_inicio)){
                    
                    return redirect()->route('ofertas.registro')->with('error', 'La fecha de inicio y fin de la oferta no puede estar dentro de las fechas de otra oferta');
                }

                if(($fechaInicio>=$oferta->fecha_inicio) && ($fechaInicio<=$oferta->fecha_fin) && ($fechaFin>= $oferta->fecha_inicio) && ($fechaFin <= $oferta->fecha_fin)){
                    
                    return redirect()->route('ofertas.registro')->with('error', 'La fecha de inicio y fin de la oferta no puede estar dentro de las fechas de otra oferta');
                }

                //oferta antigua dentro de oferta nueva
                if(($fechaInicio<= $oferta->fecha_inicio) && ($fechaInicio <= $oferta->fecha_fin) && ($fechaFin >= $oferta->fecha_inicio) && ($fechaFin >= $oferta->fecha_fin)){
                    
                    return redirect()->route('ofertas.registro')->with('error', 'La fecha de inicio y fin de la oferta no puede estar dentro de las fechas de otra oferta');

                }
                if(($fechaInicio>= $oferta->fecha_inicio) && ($fechaInicio<= $oferta->fecha_fin) && ($fechaFin>= $oferta->fecha_fin) && ($fechaFin>= $oferta->fecha_inicio)){
                    
                    return redirect()->route('ofertas.registro')->with('error', 'La fecha de inicio y fin de la oferta no puede estar dentro de las fechas de otra oferta');
                }

                   
              
            }
        }
           
           
                
                $fechaActual = date('Y-m-d');
                
                $oferta = new Oferta();

                

                if($fechaInicio > $fechaActual){
                    $oferta->nombre = $request->nombreOferta;
                    $oferta->descripcion = $request->descripcion;
                    $oferta->valor = $request->valor;
                    $oferta->fecha_inicio = $request->fechaInicio;
                    $oferta->fecha_fin = $request->fechaFin;
                    $oferta->estatus_oferta_id = 2;
                    $oferta->save();

                    
                }else{
                    $activa = Oferta::where('estatus_oferta_id', '=', 1)->first();
                    $activa->estatus_oferta_id = 0;
                    $activa->save();
                    $oferta->nombre = $request->nombreOferta;
                    $oferta->descripcion = $request->descripcion;
                    $oferta->valor = $request->valor;
                    $oferta->fecha_inicio = $request->fechaInicio;
                    $oferta->fecha_fin = $request->fechaFin;
                    $oferta->estatus_oferta_id = 1;
                    $oferta->save();
                }

                

                return redirect()->route('ofertas.listado')->with('success', 'Oferta creada correctamente');
            
                
          
            

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
    public function destroy($id)
    {
        
        $normal = Oferta::first();
        
        $oferta = Oferta::findOrFail($id);
       
        if($normal->id == $oferta->id){
            return redirect()->route('ofertas.listado')->with('error', 'No puedes eliminar la oferta Precio Normal');
        }
        if($oferta->estatus_oferta_id == 1){
            $normal->estatus_oferta_id = 1;
            $normal->save();
            $oferta->delete();
            return redirect()->route('ofertas.listado')->with('success', 'Oferta eliminada correctamente');
        }else{
            $oferta->delete();
            return redirect()->route('ofertas.listado')->with('error', 'Oferta eliminada correctamente');
        }
    }
}
