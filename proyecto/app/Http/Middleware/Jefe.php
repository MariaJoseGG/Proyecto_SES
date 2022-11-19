<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Jefe
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
            case ('2'):
                return $next($request); // si es un jefe continúa a la ruta JEFE
                break;
            case ('1'):
                return redirect('home'); //si es administrador redirige al HOME
                break;
            case ('0'):
                return redirect('auxiliar'); //si es auxiliar redirige a USER
                break;
            case ('3'):
                return redirect('medico'); // si es un médico redirige a la ruta MEDICO
                break;
        }
    }
}