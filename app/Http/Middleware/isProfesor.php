<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isProfesor
{
    public function handle($request, Closure $next)
    {
        if(!Auth::check()) {
            return redirect('/login');
        }
        //Si el usuario esta logiado
        if (Auth::user() !== null) {
            //Si el usuario es Profesor
            if(Auth::user()->rol == 1){
                return $next($request);
            }
            //Si el usuario es un Administrador, bloquea las rutas de Profesor 
            else {
                return redirect('/adminpanel');
            }
        }
        return $next($request);
    }
}
