<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Medico
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        switch (auth::user()->tipo_usuario) {
            case ('3'):
                return $next($request); // si es un médico continúa a la ruta MEDICO
                break;
            case ('2'):
                return redirect('jefe'); // si es un jefe redirige a la ruta JEFE
                break;
            case ('1'):
                return redirect('home'); //si es administrador redirige al HOME
                break;
            case ('0'):
                return redirect('auxiliar'); //si es auxiliar redirige a USER
                break;
        }
    }
}