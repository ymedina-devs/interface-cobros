<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Validator;

class MenuController extends Controller
{
	public static function funcRetornarMenuPorRol(){
		$request=new \Illuminate\Http\Request;
    	$varUsuario=Session::get('usuario')['authusuario'];
    	$sidebarHtml='';
    	$tituloHtml='';
    	$subMenu='';
    	$varBusquedaTitulo='
    	SELECT count(1), nu_consecutivo,menu.cd_padre
		    		FROM nucleo.menus menu,nucleo.usuarios usua,nucleo.rol_usuario rous , nucleo.menu_rol mero
					where usua.cd_usuario=?
					and usua.cd_usuario=rous.cd_usuario
					and mero.cd_rol=rous.cd_rol
					and menu.cd_menu=mero.cd_menu
					and menu.tp_menu=2
					group by nu_consecutivo,menu.cd_padre
					order by nu_consecutivo';
		$varMenu=DB::select($varBusquedaTitulo,[$varUsuario]);
		
		foreach ($varMenu as $key) {
			$varBusquedaMenu='SELECT menu.tx_menu,menu.cd_menu from nucleo.menus menu where menu.cd_menu='.$key->cd_padre.'
			and menu.tp_menu=1';
			$varMenu=DB::select($varBusquedaMenu);
			foreach ($varMenu as $key2) {
				$tituloHtml='<li class="nav-item pcoded-menu-caption">
                        <label>'.$key2->tx_menu.'</label>
                    </li>';
                $varBusquedaTitulo='
		    	SELECT menu.cd_padre,menu.tx_icono,menu.tx_menu,menu.cd_menu,menu.tx_color
				    		FROM nucleo.menus menu,nucleo.usuarios usua,nucleo.rol_usuario rous , nucleo.menu_rol mero
							where usua.cd_usuario=?
							and usua.cd_usuario=rous.cd_usuario
							and mero.cd_rol=rous.cd_rol
							and menu.cd_menu=mero.cd_menu
							and menu.tp_menu=2
							and menu.cd_padre='.$key2->cd_menu.'
							order by nu_consecutivo,tx_menu';
				$varMenu=DB::select($varBusquedaTitulo,[$varUsuario]);
				$varSubmenu='';
                foreach ($varMenu as $key3) {
                	$varSubmenu.='<li class="nav-item pcoded-hasmenu">';
                	$varSubmenu.='<a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="'.$key3->tx_icono.'" style="color:#a9a086"></i></span><span class="pcoded-mtext">'.$key3->tx_menu.'</span></a>';
                	$varSubmenu.='<ul class="pcoded-submenu" style="display: none;">';
                	$varBusquedaTitulo='
		    		SELECT * from nucleo.menus menu where menu.cd_padre='.$key3->cd_menu.' and menu.tp_menu=3 
							order by nu_consecutivo';
					$varMenu=DB::select($varBusquedaTitulo);
					$varEnlaces='';
					foreach ($varMenu as $key4) {
						$varEnlaces.=' <li class=""><a href="./'.$key4->tx_enlace.'" >'.$key4->tx_menu.'</a></li>';
					}
                	$varSubmenu.=$varEnlaces.'</ul>';
                	$varSubmenu.='</li>';
                }
                print_r($tituloHtml.$varSubmenu);

			}
           
		}

    	
	}
    public  function funcInsertarFormulario(Request $request){
		$modelInstance='App\\nucleo\\MenuModel';
        $validation = Validator::make(
            $request->all(),
            $modelInstance::returnValidations(),
            $modelInstance::returnMessages()
        );
        if($validation->fails()){
            echo json_encode (array($validation->errors()));

        }else{
			$modelInstance='App\\nucleo\\MenuModel';
			$varQuery=$modelInstance::create($request->all());
            echo json_encode(array('msg'=>'inserto'));
        }
    }
	public  function funcActualizarFormulario(Request $request){
		$modelInstance='App\\nucleo\\MenuModel';
        $validation = Validator::make(
            $request->all(),
            $modelInstance::returnValidationsUpd(),
            $modelInstance::returnMessagesUpd()
        );
        if($validation->fails()){
            echo json_encode (array($validation->errors()));

        }else{
			$modelInstance=new \App\nucleo\MenuModel; 
			$modelInstance->where('cd_menu', $request->post('cd_menu'))
          		->update($request->except('_token'));
            echo json_encode(array('msg'=>$request->post('cd_menu') ));
        }
    }
    public function index(){
    	$instanciaTablaCodigo=new \App\nucleo\TablaCodigoModel;
		$instanciaMenu=new \App\nucleo\MenuModel;
		$instanciaRoles=new \App\nucleo\RolesModel;
		$varRoles=$instanciaRoles->get();
		$varMenuModel=$instanciaMenu->whereIn('tp_menu',[1,2])->get();
		$varMenus=$instanciaMenu->whereIn('tp_menu',[2])->get();
		$varTablaCodigoModel=$instanciaTablaCodigo->where('cd_tabla','tp_menu')->get();
    	return view('seguridad.principal',compact('varTablaCodigoModel','varMenuModel','varRoles','varMenus'));
    }
    public function funcConsultarMenus(){
    	$varModelo=new \App\nucleo\MenuModel;
    	return $varModelo::funConsultarMenus();
    }
	public function funcConsultarMenusID($varCdMenu){
		$instanciaMenu=new \App\nucleo\MenuModel;
		$varMenuModel=$instanciaMenu->where('cd_menu',$varCdMenu)->get();
		echo json_encode($varMenuModel);
	}

	public function funcConsultarRoles(){
    	$varModelo=new \App\nucleo\RolesModel;
    	return $varModelo->get();
    }
	public function funcConsultarRolesID($varCdRol){
		$varModelo=new \App\nucleo\RolesModel;
		$varRolesModel=$varModelo->where('cd_rol',$varCdRol)->get();
		echo json_encode($varRolesModel);
	}
	public  function funcActualizarFormularioRoles(Request $request){
		$modelInstance='App\\nucleo\\RolesModel';
        $validation = Validator::make(
            $request->all(),
            $modelInstance::returnValidationsUpd(),
            $modelInstance::returnMessagesUpd()
        );
        if($validation->fails()){
            echo json_encode (array($validation->errors()));

        }else{
			$modelInstance=new \App\nucleo\RolesModel; 
			$modelInstance->where('cd_rol', $request->post('cd_rol'))
          		->update($request->except('_token'));
            echo json_encode(array('msg'=>$request->post('cd_rol') ));
        }
    }
	public  function funcInsertarFormularioRoles(Request $request){
		$modelInstance='App\\nucleo\\RolesModel';
        $validation = Validator::make(
            $request->all(),
            $modelInstance::returnValidations(),
            $modelInstance::returnMessages()
        );
        if($validation->fails()){
            echo json_encode (array($validation->errors()));

        }else{
			$modelInstance='App\\nucleo\\RolesModel';
			$varQuery=$modelInstance::create($request->all());
            echo json_encode(array('msg'=>'inserto'));
        }
    }
	public function funcConsultarMenuRol(){
		
    	$varModelo=DB::select('SELECT cd_rol,tx_menu, tx_enlace,id
			from nucleo.menu_rol mero, nucleo.menus menu
			where menu.cd_menu=mero.cd_menu
                    ');
    	return $varModelo;
    }
    public  function funcInsertarFormularioMenuRol(Request $request){
		$modelInstance='App\\nucleo\\MenuRolModel';
        $validation = Validator::make(
            $request->all(),
            $modelInstance::returnValidations(),
            $modelInstance::returnMessages()
        );
        if($validation->fails()){
            echo json_encode (array($validation->errors()));

        }else{
			$modelInstance='App\\nucleo\\MenuRolModel';
			$varQuery=$modelInstance::create($request->all());
            echo json_encode(array('msg'=>'inserto'));
        }
    }
    public function funcConsultarMenuRolID($varMenuRol){
        $varModelo=DB::select('SELECT cd_rol cd_rol_mr,menu.cd_menu cd_menu_mr,id id_mr
            from nucleo.menu_rol mero, nucleo.menus menu
            where menu.cd_menu=mero.cd_menu
            and mero.id=?
                    ',[$varMenuRol]);
        echo json_encode($varModelo);
    }
    
	public  function funcActualizarFormularioMenuRol(Request $request){
        $modelInstance='App\\nucleo\\MenuRolModel';
        $validation = Validator::make(
            $request->all(),
            $modelInstance::returnValidationsUpd(),
            $modelInstance::returnMessagesUpd()
        );
        if($validation->fails()){
            echo json_encode (array($validation->errors()));

        }else{
            $modelInstance=new \App\nucleo\MenuRolModel; 
            $modelInstance->where('id', $request->post('id'))
                ->update($request->except('_token')
                    /*['cd_rol',$request->post('cd_rol_rm'),
                    'cd_menu',$request->post('cd_menu_rm')]/*/
                );
            echo json_encode(array('msg'=>$request->post('id') ));
        }
    }
}
