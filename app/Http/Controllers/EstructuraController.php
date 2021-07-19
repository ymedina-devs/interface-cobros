<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class EstructuraController extends Controller{
	public function index(){
		$instanciaBancos=new \App\nucleo\BancosModel;
		$varBancos=$instanciaBancos->get();
    	return view('estructura.principal', compact('varBancos'));
    }
    public function funcConsultarEstructura(){
    	$varInstancia=new \App\nucleo\ConfiguracionArchivoModel;
    	$varEjecucion=$varInstancia
        ->join('nucleo.bancos','nucleo.bancos.cd_banco','nucleo.configuracion_archivo.cd_banco')
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
}
