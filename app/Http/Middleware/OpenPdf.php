<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OpenPdf
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
        return $next($request)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', sprintf(
            'inline; filename="%s"', $request->get('archivo')
        ));
    }
}
