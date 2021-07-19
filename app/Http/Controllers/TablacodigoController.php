<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class TablacodigoController extends Controller
{
   	public function index(){
    	return view('tablacodigo.principal');
    }
    public function funcConsultarTablacodigo(){
    	$varModelo=new \App\nucleo\TablacodigoModel;
    	return $varModelo->get();
    }
    public  function funcInsertarFormulario(Request $request){
		$modelInstance='App\\nucleo\\TablacodigoModel';
        $validation = Validator::make(
            $request->all(),
            $modelInstance::returnValidations(),
            $modelInstance::returnMessages()
        );
        if($validation->fails()){
            echo json_encode (array($validation->errors()));

        }else{
			$modelInstance='App\\nucleo\\TablacodigoModel';
			$varQuery=$modelInstance::create($request->all());
            echo json_encode(array('msg'=>'inserto'));
        }
    }
    public function funcConsultarTablacodigoID($varCdMenu){
		$instanciaMenu=new \App\nucleo\TablacodigoModel;
		$varMenuModel=$instanciaMenu->where('cd_tabla_cod',$varCdMenu)->get();
		echo json_encode($varMenuModel);
	}
	public  function funcActualizarFormularioTablacodigo(Request $request){
		$modelInstance='App\\nucleo\\TablacodigoModel';
        $validation = Validator::make(
            $request->all(),
            $modelInstance::returnValidationsUpd(),
            $modelInstance::returnMessagesUpd()
        );
        if($validation->fails()){
            echo json_encode (array($validation->errors()));

        }else{
			$modelInstance=new \App\nucleo\TablacodigoModel; 
			$modelInstance->where('cd_tabla_cod', $request->post('cd_tabla_cod'))
          		->update($request->except('_token'));
            echo json_encode(array('msg'=>$request->post('cd_tabla_cod') ));
        }
    }
}
