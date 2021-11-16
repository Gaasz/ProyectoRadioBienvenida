<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use App\Models\Dia;
use Illuminate\Http\Request;
use Storage;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $programas = Programa::all();
        return view('programas.index', compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        
         $dias = Dia::all();
        
        return view('programas.create', compact('dias'));
        // return view('programas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        //  $request->validate([
        //      'nombreDelPrograma' => 'required',
        //      'descripcion' => 'required',
        //      'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //      'dias' => 'required',
        //  ]);

        
        $programa = new Programa();
        $id = date('mdYhis', time());
        $programa->id = $id;
        $programa->nombre_programa = $request->nombreDelPrograma;
        $programa->descripcion_programa = $request->descripcion;
        $programa->imagen_programa = $request->imagen->store('programas', 'public');
        $programa->save();
        $programa = Programa::findOrFail($id);
        
        foreach ($request->dias as $dia) {
            
            $programa->dias()->attach($dia);

        }
            
        

        //recibir horarios de los dias
        
        // $lunes = [$request->Lunes_inicio, $request->Lunes_fin, $request->Lunes_inicio1, $request->Lunes_fin1, $request->Lunes_inicio2, $request->Lunes_fin2];
        // $martes = [$request->Martes_inicio, $request->Martes_fin, $request->Martes_inicio1, $request->Martes_fin1, $request->Martes_inicio2, $request->Martes_fin2];
        // $miercoles = [$request->Miércoles_inicio, $request->Miércoles_fin, $request->Miércoles_inicio1, $request->Miércoles_fin1, $request->Miércoles_inicio2, $request->Miércoles_fin2];
        // $jueves = [$request->Jueves_inicio, $request->Jueves_fin, $request->Jueves_inicio1, $request->Jueves_fin1, $request->Jueves_inicio2, $request->Jueves_fin2];
        // $viernes = [$request->Viernes_inicio, $request->Viernes_fin, $request->Viernes_inicio1, $request->Viernes_fin1, $request->Viernes_inicio2, $request->Viernes_fin2];
        // $sabado = [$request->Sábado_inicio, $request->Sábado_fin, $request->Sábado_inicio1, $request->Sábado_fin1, $request->Sábado_inicio2, $request->Sábado_fin2];
        // $domingo = [$request->Domingo_inicio, $request->Domingo_fin, $request->Domingo_inicio1, $request->Domingo_fin1, $request->Domingo_inicio2, $request->Domingo_fin2];

        //recorrer los dias

        // $diamartes = Dia::findOrFail(2);
        // $diamiercoles = Dia::findOrFail(3);
        // $diajueves = Dia::findOrFail(4);
        // $diaviernes = Dia::findOrFail(5);
        // $diasabado = Dia::findOrFail(6);
        // $diadomingo = Dia::findOrFail(7);

        
        //ciclo for para determionar si hay horarios vacios
        // for ($i=0; $i < 6; $i+=2) { 
        //     if ($lunes[$i] != null) {
        //         if($lunes[$i+1] != null){
        //             $dialunes = Dia::findOrFail(1);
        //             $dialunes->horas()->attach($lunes[$i]);
        //             $dialunes->horas()->attach($lunes[$i+1]);
        //         }
        //     }
        //     if ($martes[$i] != null) {
        //         if($martes[$i+1] != null){
        //             $diamartes->horas()->attach($martes[$i]);
        //             $diamartes->horas()->attach($martes[$i+1]);
        //         }
                
        //     }
        //     if ($miercoles[$i] != null) {
                
        //         if($miercoles[$i+1] != null){
        //             $diamiercoles->horas()->attach($miercoles[$i]);
        //             $diamiercoles->horas()->attach($miercoles[$i+1]);
        //         }
                

        //     }
        //     if ($jueves[$i] != null) {
                
        //         if($jueves[$i+1] != null){
        //             $diajueves->horas()->attach($jueves[$i]);
        //             $diajueves->horas()->attach($jueves[$i+1]);
        //         }
                

        //     }
        //     if ($viernes[$i] != null) {
                
        //         if($viernes[$i+1] != null){
        //             $diaviernes->horas()->attach($viernes[$i]);
        //             $diaviernes->horas()->attach($viernes[$i+1]);
        //         }
                

        //     }
        //     if ($sabado[$i] != null) {
                    
        //             if($sabado[$i+1] != null){
        //                 $diasabado->horas()->attach($sabado[$i]);
        //                 $diasabado->horas()->attach($sabado[$i+1]);
        //             }
                    
    
                
        //     }
        //     if ($domingo[$i] != null) {
                        
        //                 if($domingo[$i+1] != null){
        //                     $diadomingo->horas()->attach($domingo[$i]);
        //                     $diadomingo->horas()->attach($domingo[$i+1]);
        //                 }
                        
        
                    
                
        //     }
        // }
        

       
        

      


       

        return redirect()->route('programas.listado')->with('success', 'Programa creado correctamente');





       


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programa = Programa::findOrFail($id);
        $dias = Dia::all();
        return view('programas.edit', compact('programa', 'dias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programa $programa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programa = Programa::findOrFail($id);
        $programa->delete();
        return redirect()->route('programas.listado');

    }
}
