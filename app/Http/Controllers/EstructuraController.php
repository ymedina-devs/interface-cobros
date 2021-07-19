<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class EstructuraController extends Controller{
	public function index(){
		$instanciaTablacodigo=new \App\nucleo\TablacodigoModel;
		$varTablacodigo=$instanciaTablacodigo->where('cd_tabla','tp_formato')->get();
        $varTablacodigo1=$instanciaTablacodigo->where('cd_tabla','tp_generacion_archivo')->get();
    	return view('configuracionarchivo.principal', compact('varTablacodigo','varTablacodigo1'));
    }
    public function funcConsultarEstructura(){
    	$varInstancia=new \App\nucleo\ConfiguracionArchivoModel;
    	$varEjecucion=$varInstancia
        ->join('nucleo.tablacodigo as t','t.cd_modulo','nucleo.configuracion_archivo.tx_tipo')
        ->where('t.cd_tabla','tp_generacion_archivo')
        ->get();

        return($varEjecucion);
    }
    public  function funcInsertarFormulario(Request $request){
		$modelInstance='App\\nucleo\\ConfiguracionArchivoModel';
        $validation = Validator::make(
            $request->all(),
            $modelInstance::returnValidations(),
            $modelInstance::returnMessages()
        );
        if($validation->fails()){
            echo json_encode (array($validation->errors()));

        }else{
			$modelInstance='App\\nucleo\\ConfiguracionArchivoModel';
			$varQuery=$modelInstance::create($request->all());
            echo json_encode(array('msg'=>'inserto'));
        }
    }
    public function funcConsultarConfiguracionArchivoID($varCdMenu){
		$instanciaMenu=new \App\nucleo\ConfiguracionArchivoModel;
		$varMenuModel=$instanciaMenu->where('cd_configuracion',$varCdMenu)->get();
		echo json_encode($varMenuModel);
	}
	public  function funcActualizarFormularioConfiguracionArchivo(Request $request){
		$modelInstance='App\\nucleo\\ConfiguracionArchivoModel';
        $validation = Validator::make(
            $request->all(),
            $modelInstance::returnValidationsUpd(),
            $modelInstance::returnMessagesUpd()
        );
        if($validation->fails()){
            echo json_encode (array($validation->errors()));

        }else{
			$modelInstance=new \App\nucleo\ConfiguracionArchivoModel; 
			$modelInstance->where('cd_configuracion', $request->post('cd_configuracion'))
          		->update($request->except(['_token','actx_tipo_temp']));
            echo json_encode(array('msg'=>$request->post('cd_configuracion') ));
        }
    }

    public function indexEstructura(){
        $instanciaTablacodigo=new \App\nucleo\TablacodigoModel;
        $varTablacodigo=$instanciaTablacodigo->where('cd_tabla','tp_generacion_archivo')->get();
        $varTablacodigo1=$instanciaTablacodigo->where('cd_tabla','tp_objeto_sal')->get();
        $varTablacodigo2=$instanciaTablacodigo->where('cd_tabla','tp_registro')->get();
        $instanciaTablacodigo=new \App\nucleo\BancosModel;
        $varBancos=$instanciaTablacodigo->get();
        return view('estructura.principal', compact('varTablacodigo','varTablacodigo1','varBancos','varTablacodigo2'));
    }
}
