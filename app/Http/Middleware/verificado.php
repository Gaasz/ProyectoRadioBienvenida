<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class verificado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        $usuario = User::findOrFail(session('id'));
        if($usuario->email_verified_at == null){
            //logout user
            $request->session()->flush();
            return redirect('/login')->with('error', 'Por favor verifique su correo electrónico');
        }else{
            return $next($request);
        }
    }
}
