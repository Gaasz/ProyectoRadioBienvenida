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


        return 'wena compita';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function show(Programa $programa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function edit(Programa $programa)
    {
        //
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
    public function destroy(Programa $programa)
    {
        //
    }
}
