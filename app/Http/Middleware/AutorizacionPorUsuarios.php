<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use DB;

class AutorizacionPorUsuarios
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
            $uri=$request->path();
            if($uri=='welcome'){
                
            }else{
                $varBusquedaTitulo='
                   SELECT count(1) existe
                    from nucleo.rol_usuario rous,
                    nucleo.menu_rol mero,
                    nucleo.menus menu
                    
                    where rous.cd_rol=mero.cd_rol
                    and menu.cd_padre=mero.cd_menu
                    and rous.cd_usuario=?
                    and menu.tx_enlace=?';
                $varMenu=DB::select($varBusquedaTitulo,[$varUsuario,$uri]);
                if($varMenu[0]->existe==1){

                }else{
                    return redirect()->route('welcome');
                }
            }
            //
        }else{
            return redirect()->route('auth.login');
        }
        
        
        return $next($request);
    }
}
