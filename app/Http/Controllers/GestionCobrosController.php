<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class GestionCobrosController extends Controller{
    public function index(){
		$varModelo=new \App\nucleo\TablacodigoModel;
		$sesionEmpresa=Session::get('usuario')['authcdempresa'];
		$sesionUsuario=Session::get('usuario')['authusuario'];
    	$varCodigos=$varModelo->where('cd_tabla','tp_emisor')->get();
    	$varCodigos2=$varModelo->where('cd_tabla','tp_grupo_cobro')->get();
    	$varEmpresa=array('1'=>$sesionEmpresa);
    	$varUsuario=array('1'=>$sesionUsuario);
    	return view('gestioncobros.principal',compact('varCodigos','varCodigos2','varEmpresa','varUsuario','varUsuario'));
    }
}
