<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class AuthController extends Controller{
    public function autenticar(Request $request){
    	$varUsuario=$request->post('tx_usuario');
    	$varClave=$request->post('tx_clave');
    	$varQuery="SELECT usua.cd_usuario, usua.cd_usuario_ext,usua.cd_empresa,empr.tx_empresa,empr.tx_icono,usua.tx_nombre
    				from nucleo.usuarios usua,nucleo.empresas empr
    				where usua.cd_usuario=? and usua.tx_clave=?
    				and  usua.cd_empresa=empr.cd_empresa";
    	$varResultado='';
    	if($varClave && $varUsuario){
    		$varResultado=DB::select($varQuery,[$varUsuario,$varClave]);
    		if(sizeof($varResultado)>0){
    			//$request->session()->flush();
    			print_r($varResultado[0]->cd_usuario);
    			Session::put('usuario',['authusuario'=> $varResultado[0]->cd_usuario,
    				'authcdempresa'=> $varResultado[0]->cd_empresa,
    				'authusuarioext'=> $varResultado[0]->cd_usuario_ext,
    				'authtxempresa'=>$varResultado[0]->tx_empresa,
    				'authempresaicono'=>$varResultado[0]->tx_icono,
                    'authusuarionombre'=>$varResultado[0]->tx_nombre
                ]
    			);
  
    			return redirect()->route('welcome');
			}else{
				return redirect()->route('auth.login');
			}
    	}
    	
    	
    }
    public function desconectar(){
    	session()->flush();
    	return redirect('/');
    }
}
