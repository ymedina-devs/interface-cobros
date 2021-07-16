<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class UsuariosController extends Controller
{
    public  function funcInsertarFormulario(Request $request){
		$modelInstance='App\\nucleo\\UsuariosModel';
        $validation = Validator::make(
            $request->all(),
            $modelInstance::returnValidations(),
            $modelInstance::returnMessages()
        );
        if($validation->fails()){
            echo json_encode (array($validation->errors()));

        }else{
			$modelInstance='App\\nucleo\\UsuariosModel';
			$varQuery=$modelInstance::create($request->all());
            echo json_encode(array('msg'=>'inserto'));
        }
    }
	public  function funcActualizarFormulario(Request $request){
		$modelInstance='App\\nucleo\\UsuariosModel';
        $validation = Validator::make(
            $request->all(),
            $modelInstance::returnValidationsUpd(),
            $modelInstance::returnMessagesUpd()
        );
        if($validation->fails()){
            echo json_encode (array($validation->errors()));

        }else{
			$modelInstance=new \App\nucleo\UsuariosModel; 
			$modelInstance->where('cd_usuario', $request->post('cd_usuario'))
          		->update($request->except('_token'));
            echo json_encode(array('msg'=>$request->post('cd_usuario') ));
        }
    }
    public function funcConsultarUsuarios(){
        $varQuery='SELECT emp.tx_empresa, usua.tx_nombre,usua.cd_usuario,usua.cd_usuario_ext
         from nucleo.usuarios usua, nucleo.empresas emp where usua.cd_empresa=emp.cd_empresa';
        $varModelo=DB::select($varQuery);
    	return $varModelo;
    }
    public function index(){
		$instanciaEmpresa=new \App\nucleo\EmpresasModel;
		$varEmpresas =$instanciaEmpresa->get();
    	return view('usuarios.principal',compact('varEmpresas'));
    }
	public function funcConsultarUsuariosID($varCdMenu){
		$instanciaMenu=new \App\nucleo\UsuariosModel;
		$varUsuariosModel=$instanciaMenu->where('cd_usuario',$varCdMenu)->get();  
		echo json_encode($varUsuariosModel);
	}
}
