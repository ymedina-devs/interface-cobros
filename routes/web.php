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

});




/**
Rutas para autenticacion
**/
Route::get('/', function () { return view('auth.login');})->name('auth.login');
Route::post('/auth.autenticar','AuthController@autenticar');
Route::get('/auth.desconectar','AuthController@desconectar');

