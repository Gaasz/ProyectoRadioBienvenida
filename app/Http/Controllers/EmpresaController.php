<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\User;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $usuario = User::findOrFail($id);
        $empresa = Empresa::findOrFail($usuario->empresa_id);
        return view('empresas.edit', compact('usuario', 'empresa'));
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
        $request->validate([
            'nombreEmpresa' => 'required',
            'direccion' => 'required',]);
        $usuario = User::findOrFail($id);
        $empresa = Empresa::findOrFail($usuario->empresa_id);

        if($request->nombreEmpresa!= $empresa->nombre_empresa || $request->direccion != $empresa->direccion){
            
            $empresa->nombre_empresa = $request->nombreEmpresa;
            $empresa->direccion = $request->direccion;
            $empresa->save();
            return redirect()->route('usuarios.detalle', $id)->with('successEmpresa', 'Empresa actualizada correctamente');
        }else{
            return redirect()->route('usuarios.detalle', $id)->with('successEmpresa', 'No se han realizado cambios');
        }

      
        
            
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
}
