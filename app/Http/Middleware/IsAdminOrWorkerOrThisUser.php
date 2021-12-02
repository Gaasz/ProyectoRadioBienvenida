<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdminOrWorkerOrThisUser
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
       if(session()->get('rol')==1 || session()->get('rol')==2 || session()->get('id')==$request->route('id')){
            return $next($request);
        }else{
            return redirect('/home');
        }
    }
}
