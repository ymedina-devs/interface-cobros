<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AutorizacionDefecto
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $varUsuario=Session::get('usuario')['authusuario'];
        if($varUsuario){
            
        }else{
            return redirect()->route('auth.login');
        }
        return $next($request);
    }
}
