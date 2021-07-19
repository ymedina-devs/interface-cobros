<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['autorizacion'])->group(function () {
	Route::get('/usuarios.principal','UsuariosController@index');
	Route::get('/seguridad.principal','MenuController@index');
	Route::get('/bancos.principal','BancosController@index');
	Route::get('/empresas.principal','EmpresasController@index');
	Route::get('/tablacodigo.principal','TablacodigoController@index');
	Route::get('/cuentasbancarias.principal','CuentasbancariasController@index');
	Route::get('/ordenes.principal','OrdenesController@index');
	Route::get('/configuracionarchivos.principal','EstructuraController@index');
	Route::get('/estructura.principal','EstructuraController@indexEstructura');
	Route::get('/welcome', function () {
		return view('welcome');
	})->name('welcome');
});

Route::middleware(['autorizacion.defecto'])->group(function () {
	Route::get('/roles.consultar','MenuController@funcConsultarRoles');
	Route::get('/roles.consultar.reg/{cd_rol}','MenuController@funcConsultarRolesID');
	Route::post('/roles.registrar','MenuController@funcInsertarFormularioRoles');
	Route::post('/roles.actualizar','MenuController@funcActualizarFormularioRoles');

	Route::get('/usuarios.consultar','UsuariosController@funcConsultarUsuarios');
	Route::get('/usuarios.consultar.reg/{cd_menu}','UsuariosController@funcConsultarUsuariosID');
	Route::post('/usuarios.registrar','UsuariosController@funcInsertarFormulario');
	Route::post('/usuarios.actualizar','UsuariosController@funcActualizarFormulario');

	Route::post('/menus.registrar','MenuController@funcInsertarFormulario');
	Route::get('/menus.consultar','MenuController@funcConsultarMenus');
	Route::get('/menus.consultar.reg/{cd_menu}','MenuController@funcConsultarMenusID');
	Route::post('/menus.actualizar','MenuController@funcActualizarFormulario');

	Route::get('/menurol.consultar','MenuController@funcConsultarMenuRol');
	Route::post('/menurol.registrar','MenuController@funcInsertarFormularioMenuRol');
	Route::get('/menurol.consultar.reg/{id}','MenuController@funcConsultarMenuRolID');
	Route::post('/menurol.actualizar','MenuController@funcActualizarFormularioMenuRol');

	Route::get('/bancos.consultar','BancosController@funcConsultarBancos');
	Route::post('/bancos.registrar','BancosController@funcInsertarFormulario');
	Route::get('/bancos.consultar.reg/{cd_banco}','BancosController@funcConsultarBancosID');
	Route::post('/bancos.actualizar','BancosController@funcActualizarFormularioBancos');
	
	Route::get('/empresas.consultar','EmpresasController@funcConsultarEmpresas');
	Route::post('/empresas.registrar','EmpresasController@funcInsertarFormulario');
	Route::get('/empresas.consultar.reg/{cd_banco}','EmpresasController@funcConsultarEmpresasID');
	Route::post('/empresas.actualizar','EmpresasController@funcActualizarFormularioEmpresas');

	Route::get('/tablacodigo.consultar','TablacodigoController@funcConsultarTablacodigo');
	Route::post('/tablacodigo.registrar','TablacodigoController@funcInsertarFormulario');
	Route::get('/tablacodigo.consultar.reg/{cd_banco}','TablacodigoController@funcConsultarTablacodigoID');
	Route::post('/tablacodigo.actualizar','TablacodigoController@funcActualizarFormularioTablacodigo');

	Route::get('/cuentasbancarias.consultar','CuentasbancariasController@funcConsultarCuentasbancarias');
	Route::post('/cuentasbancarias.registrar','CuentasbancariasController@funcInsertarFormulario');
	Route::get('/cuentasbancarias.consultar.reg/{cd_banco}','CuentasbancariasController@funcConsultarCuentasbancariasID');
	Route::post('/cuentasbancarias.actualizar','CuentasbancariasController@funcActualizarFormularioCuentasbancarias');
	Route::get('/cuentasbancarias.buscarverificadobanco/{cd_banco}','CuentasbancariasController@funcBuscarVerificadorBanco');

	Route::get('/ordenes.consultar','OrdenesController@funcMostrarOrdenesPorTipo');
	
	Route::get('/configuracionarchivo.consultar','EstructuraController@funcConsultarEstructura');
	Route::post('/configuracionarchivo.registrar','EstructuraController@funcInsertarFormulario');
	Route::get('/configuracionarchivo.consultar.reg/{cd_banco}','EstructuraController@funcConsultarConfiguracionArchivoID');
	Route::post('/configuracionarchivo.actualizar','EstructuraController@funcActualizarFormularioConfiguracionArchivo');
	

});






/**
Rutas para autenticacion
**/
Route::get('/', function () { return view('auth.login');})->name('auth.login');
Route::post('/auth.autenticar','AuthController@autenticar');
Route::get('/auth.desconectar','AuthController@desconectar');

