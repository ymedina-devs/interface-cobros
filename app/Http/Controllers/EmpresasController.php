<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class EmpresasController extends Controller
{
     public function index(){
     	$instanciaTablaCodigo=new \App\nucleo\TablaCodigoModel;
     	$varTablaCodigoModel=$instanciaTablaCodigo->where('cd_tabla','tp_documento')->get();
    	return view('empresas.principal',compact('varTablaCodigoModel'));
    }
    public function funcConsultarEmpresas(){
    	$varModelo=new \App\nucleo\EmpresasModel;
    	return $varModelo->get();
    }
    public  function funcInsertarFormulario(Request $request){
		$modelInstance='App\\nucleo\\EmpresasModel';
        $validation = Validator::make(
            $request->all(),
            $modelInstance::returnValidations(),
            $modelInstance::returnMessages()
        );
        if($validation->fails()){
            echo json_encode (array($validation->errors()));

        }else{
			$modelInstance='App\\nucleo\\EmpresasModel';
			$varQuery=$modelInstance::create($request->all());
            echo json_encode(array('msg'=>'inserto'));
        }
    }
    public function funcConsultarEmpresasID($varCdMenu){
		$instanciaMenu=new \App\nucleo\EmpresasModel;
		$varMenuModel=$instanciaMenu->where('cd_empresa',$varCdMenu)->get();
		echo json_encode($varMenuModel);
	}
	public  function funcActualizarFormularioEmpresas(Request $request){
		$modelInstance='App\\nucleo\\EmpresasModel';
        $validation = Validator::make(
            $request->all(),
            $modelInstance::returnValidationsUpd(),
            $modelInstance::returnMessagesUpd()
        );
        if($validation->fails()){
            echo json_encode (array($validation->errors()));

        }else{
			$modelInstance=new \App\nucleo\EmpresasModel; 
			$modelInstance->where('cd_empresa', $request->post('cd_empresa'))
          		->update($request->except('_token'));
            echo json_encode(array('msg'=>$request->post('cd_empresa') ));
        }
    }
}
