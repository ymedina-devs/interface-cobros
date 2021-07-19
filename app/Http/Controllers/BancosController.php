<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
class BancosController extends Controller
{
    public function index(){
    	return view('bancos.principal');
    }
    public function funcConsultarBancos(){
    	$varModelo=new \App\nucleo\BancosModel;
    	return $varModelo->get();
    }
    public  function funcInsertarFormulario(Request $request){
		$modelInstance='App\\nucleo\\BancosModel';
        $validation = Validator::make(
            $request->all(),
            $modelInstance::returnValidations(),
            $modelInstance::returnMessages()
        );
        if($validation->fails()){
            echo json_encode (array($validation->errors()));

        }else{
			$modelInstance='App\\nucleo\\BancosModel';
			$varQuery=$modelInstance::create($request->all());
            echo json_encode(array('msg'=>'inserto'));
        }
    }
    public function funcConsultarBancosID($varCdMenu){
		$instanciaMenu=new \App\nucleo\BancosModel;
		$varMenuModel=$instanciaMenu->where('cd_banco',$varCdMenu)->get();
		echo json_encode($varMenuModel);
	}
	public  function funcActualizarFormularioBancos(Request $request){
		$modelInstance='App\\nucleo\\BancosModel';
        $validation = Validator::make(
            $request->all(),
            $modelInstance::returnValidationsUpd(),
            $modelInstance::returnMessagesUpd()
        );
        if($validation->fails()){
            echo json_encode (array($validation->errors()));

        }else{
			$modelInstance=new \App\nucleo\BancosModel; 
			$modelInstance->where('cd_banco', $request->post('cd_banco'))
          		->update($request->except('_token'));
            echo json_encode(array('msg'=>$request->post('cd_banco') ));
        }
    }
}
