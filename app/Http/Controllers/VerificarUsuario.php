<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificarUsuario extends Controller
{
    public function verificar($id, $contraseña){
        //unhash the id
        $id = \Crypt::decrypt($id);
        //find the user
        $usuario = \App\User::find($id);
        //verify the password
        if(\Hash::check($contraseña, $usuario->password)){
            //if the password is correct, log the user in
            \Auth::login($usuario);
            $usuario->email_verified_at = \Carbon\Carbon::now();
            //redirect to the home page
            return redirect('/home');
        }else{
            //if the password is incorrect, redirect to the login page
            return redirect('/login')->with('error', 'Cuenta no verificada');
        }

        

}
