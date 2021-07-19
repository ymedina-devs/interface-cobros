<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Validator;

class CuentasbancariasController extends Controller
{
    public function index(){
    	$varModelo=new \App\nucleo\BancosModel;
    	$varBancos=$varModelo->get();
    	$sesionEmpresa=Session::get('usuario')['authcdempresa'];
    	$select="SELECT * from nucleo.empresas empr, nucleo.tablacodigo taco where empr.tp_documento::integer=taco.cd_modulo
    	and taco.cd_tabla='tp_documento' and empr.cd_empresa=?";
    	$varEmpresas=DB::select($select,[$sesionEmpresa]);
    	return view('cuentasbancarias.principal',compact('varEmpresas','varBancos'));
    }
    public function funcConsultarCuentasbancarias(){
    	$sesionEmpresa=Session::get('usuario')['authcdempresa'];
    	$select="SELECT * from nucleo.empresas empr, nucleo.bancos banc, nucleo.cuentasbancarias cuba
    	 where cuba.cd_empresa=? 
    	 and cuba.cd_banco=banc.cd_banco 
    	 and cuba.cd_empresa=empr.cd_empresa";
    	$varEmpresas=DB::select($select,[$sesionEmpresa]);
    	return ($varEmpresas);
    }
    public  function funcInsertarFormulario(Request $request){
		$modelInstance='App\\nucleo\\CuentasbancariasModel';
		$sesionEmpresa=Session::get('usuario')['authcdempresa'];
		$request->request->add(['cd_empresa' => $sesionEmpresa]);
        $validation = Validator::make(
            $request->all(),
            $modelInstance::returnValidations(),
            $modelInstance::returnMessages()
        );
        if($validation->fails()){
            echo json_encode (array($validation->errors()));

        }else{
			$modelInstance='App\\nucleo\\CuentasbancariasModel';
			$varQuery=$modelInstance::create($request->all());
            echo json_encode(array('msg'=>'inserto'));
        }
    }
    public function funcConsultarCuentasbancariasID($varCdMenu){
		$instanciaMenu=new \App\nucleo\CuentasbancariasModel;
		$varMenuModel=$instanciaMenu->where('cd_cuentabancaria',$varCdMenu)->get();
		echo json_encode($varMenuModel);
	}
	public  function funcActualizarFormularioCuentasbancarias(Request $request){
		$modelInstance='App\\nucleo\\CuentasbancariasModel';
        $validation = Validator::make(
            $request->all(),
            $modelInstance::returnValidationsUpd(),
            $modelInstance::returnMessagesUpd()
        );
        if($validation->fails()){
            echo json_encode (array($validation->errors()));

        }else{
			$modelInstance=new \App\nucleo\CuentasbancariasModel; 
			$modelInstance->where('cd_cuentabancaria', $request->post('cd_cuentabancaria'))
          		->update($request->except('_token'));
            echo json_encode(array('msg'=>$request->post('cd_cuentabancaria') ));
        }
    }

    public function funcBuscarVerificadorBanco($varCdBanco){
    	$select="SELECT * from nucleo.bancos banc
    	 where banc.cd_banco=?";
    	$varBancos=DB::select($select,[$varCdBanco]);
    	return ($varBancos);
    }
}
