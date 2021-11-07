<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Empresa;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $usuarios = User::with('empresa','rol')->get();
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
        $request->validate([
            'primerNombre' => 'required|alpha',
            'segundoNombre' => 'required|alpha',
            'apellidoPaterno'=> 'required|alpha',
            'apellidoMaterno'=> 'required|alpha',
            'email' => 'required|email|unique:users',
            'contraseña' => 'required|min:8|confirmed',
            'telefono' => 'required|digits:9|unique:users'
        ]);
     

        $empresa = Empresa::orderBy('created_at', 'desc')->first()->id_empresa; 
        
        $trabajador = new User;
        $trabajador->id = date('mdYhis', time());
        $trabajador->primer_nombre = $request->primerNombre;
        $trabajador->segundo_nombre = $request->segundoNombre;
        $trabajador->apellido_paterno = $request->apellidoPaterno;
        $trabajador->apellido_materno = $request->apellidoMaterno;
        $trabajador->password = Hash::make($request->contraseña);
        $trabajador->email = $request->correo;
        $trabajador->telefono = $request->telefono;
        $trabajador->rol_id = '2';
        $trabajador->empresa_id = $empresa;
        $trabajador->email_verified_at = date('Y-m-d H:i:s');
        $trabajador->save();
        
        return redirect()->route('usuarios.listado')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.show', compact('usuario'));        
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
        return view('usuarios.edit', compact('usuario'));
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
        $usuario = User::findOrFail($id);
        $id = $usuario->id;

        $request->validate([
            'primerNombre' => 'required|alpha',
            'segundoNombre' => 'required|alpha',
            'apellidoPaterno'=> 'required|alpha',
            'apellidoMaterno'=> 'required|alpha',
            'email' => 'required|email|unique:users,email,'.$id,
            'telefono' => 'required|digits:9|unique:users,telefono,'. $id,

        ]);

        if($request->primerNombre != $usuario->primer_nombre || $request->segundoNombre != $usuario->segundo_nombre || $request->apellidoPaterno != $usuario->apellido_paterno || $request->apellidoMaterno != $usuario->apellido_materno || $request->email != $usuario->email || $request->telefono != $usuario->telefono){
            $usuario->primer_nombre = $request->primerNombre;
            $usuario->segundo_nombre = $request->segundoNombre;
            $usuario->apellido_paterno = $request->apellidoPaterno;
            $usuario->apellido_materno = $request->apellidoMaterno;
            $usuario->email = $request->email;
            $usuario->telefono = $request->telefono;
            $usuario->save();
            return redirect()->route('usuarios.detalle',$id)->with('success', 'Usuario actualizado correctamente');
        }else{
            return redirect()->route('usuarios.detalle',$id)->with('success', 'No se han realizado cambios');
        }
        
    }

    public function updatePassword(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        
        $request->validate([
            'contraseñaActual' => 'required|current_password',
            'nuevaContraseña' => 'required|string|min:8|confirmed|different:contraseñaActual',
        ]);

        if(Hash::check($request->contraseña, $usuario->password)){
            $usuario->password = Hash::make($request->nuevaContraseña);
            $usuario->save();
            return redirect()->route('usuarios.detalle',$id)->with('successContraseña', 'Contraseña actualizada correctamente');
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
        $usuario = User::findOrFail($id);
        $empresa = Empresa::findOrFail($usuario->empresa_id);
        $usuario->delete();
        $empresa->delete();
        return redirect()->route('usuarios.listado')->with('success', 'Usuario eliminado correctamente');
    }
}
