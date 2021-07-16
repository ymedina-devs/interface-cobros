<?php

namespace App\nucleo;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model{
	protected $table="nucleo.menus";
    protected $fillable=['tx_menu','tx_enlace','tx_icono','cd_padre','nu_consecutivo','tp_menu'];
    public $timestamps = false;
    public $primaryKey='cd_menu';
    static function returnValidationsUpd(){
        return $validations=[
            'tx_menu'=>'required|regex:/^[\pL\s\-]+$/u',
            'tx_enlace'=>'required|regex:/(^([a-zA-Z\.]+)(\d+)?$)/u',
            'tx_icono'=>'required',
            'cd_padre'=>'required',
            'nu_consecutivo'=>'required',
            'tp_menu'=>'required'
        ];
    }
    static function  returnMessagesUpd(){
        return $messages=[
            'tx_menu.required'=>'Inserte un valor para este formulario',
            'tx_enlace.required'=>'Inserte un valor para este formulario.',
            'tx_icono.required'=>'Inserte un valor para este formulario.',
            'nu_consecutivo.required'=>'Inserte un valor para este formulario.',
            'cd_padre.required'=>'Inserte un valor para este formulario.',
            'tp_menu.required'=>'Inserte un valor para este formulario.',
        ];
    }
    static function returnValidations(){
        return $validations=[
            'tx_menu'=>'required|unique:pgsql.nucleo.menus|regex:/^[\pL\s\-]+$/u',
            'tx_enlace'=>'required|unique:pgsql.nucleo.menus|regex:/(^([a-zA-Z\.]+)(\d+)?$)/u',
            'tx_icono'=>'required',
            'cd_padre'=>'required',
            'nu_consecutivo'=>'required',
            'tp_menu'=>'required'
        ];
    }
    static function  returnMessages(){
        return $messages=[
            'tx_menu.required'=>'Inserte un valor para este formulario',
            'tx_enlace.required'=>'Inserte un valor para este formulario.',
            'tx_icono.required'=>'Inserte un valor para este formulario.',
            'nu_consecutivo.required'=>'Inserte un valor para este formulario.',
            'cd_padre.required'=>'Inserte un valor para este formulario.',
            'tx_menu.unique'=>'El valor insertado existe en nuestros registros.',
            'tx_enlace.unique'=>'El valor insertado existe en nuestros registros.',
            'tx_menu.regex'=>'El valor no debe contener espacios " ", ni números.',
            'tx_enlace.regex'=>'El valor no debe contener espacios " ", ni números.',
        ];
    } 	
    public static function funConsultarMenus(){
    	return (MenuModel::orderBy('nu_consecutivo','asc')
    		->orderBy('tp_menu','asc')
    		->get());
    }

}
