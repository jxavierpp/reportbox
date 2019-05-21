<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    public function handle($request, Closure $next, $guard = null)
    {
        if(!Auth::check()) {
            return redirect('/login');
        }
        //Si el usuario esta logiado
        if (Auth::user() !== null) {
            //Si el usuario es admin
            if(Auth::user()->rol == 0){
                return $next($request);
            }
            //Si el usuario es un profesor, bloquea las rutas de administrador 
            else {
                return redirect('/formulario');
            }
        }
        return $next($request);
    }
}
