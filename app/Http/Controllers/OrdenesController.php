<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class OrdenesController extends Controller
{
    public function index(){
        return view('ordenes.principal');
    }
    public function funcMostrarOrdenesPorTipo(){
    	$varInstancia=new \App\nucleo\OrdenesModel;
    	$sesionEmpresa=Session::get('usuario')['authcdempresa'];
    	$sesionUsuario=Session::get('usuario')['authusuario'];
    	$varEjecucion=$varInstancia
        ->join('colas.programas','colas.programas.cd_programa','colas.ordenes.cd_programa')
        ->join('nucleo.tablacodigo','nucleo.tablacodigo.cd_modulo','colas.ordenes.tp_orden')
        ->where('cd_usuario',$sesionUsuario)
    					->where('cd_empresa',$sesionEmpresa)
    					->where('cd_usuario',$sesionUsuario)
    					->where('tp_orden','1')
                        ->where('cd_tabla','tp_reporte')
    					->get();
        return($varEjecucion);
    }
    public function indexReportePrueba(){
        return view('ordenes.reporteprueba');
    }
    public function funcInsertarOrden($request){
		$modelInstance=new App\nucleo\OrdenesModel;
		$varQuery=$modelInstance::create($request->all());
        echo json_encode(array('msg'=>'Se ha generado la orden'));
    }
}
    