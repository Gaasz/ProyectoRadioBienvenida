<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $usuarios = User::with('empresa')->get();
    // return $usuarios;
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $trabajador = new User;
        $trabajador->primer_nombre = $request->primerNombre;
        $trabajador->segundo_nombre = $request->segundoNombre;
        $trabajador->apellido_paterno = $request->apellidoPaterno;
        $trabajador->apellido_materno = $request->apellidoMaterno;
        $trabajador->password = Hash::make($request->contraseña);
        $trabajador->email = $request->correo;
        $trabajador->telefono = $request->telefono;
        $trabajador->rol_id = '2';
        $trabajador->empresa_id = '1';
        $trabajador->email_verified_at = date('Y-m-d H:i:s');
        $trabajador->save();
        
        return redirect()->route('usuarios.listado');
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
}
