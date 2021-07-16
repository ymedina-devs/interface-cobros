<?php

namespace App\nucleo;

use Illuminate\Database\Eloquent\Model;

class UsuariosModel extends Model
{
    protected $table="nucleo.usuarios";
    protected $fillable=['cd_usuario','tx_clave','fe_registro','tx_nombre','st_registro','cd_usuario_ext','cd_empresa'];
    public $timestamps = false;
    public $incrementing = false;
    static function returnValidationsUpd(){
        return $validations=[
            'cd_usuario'=>'required|alpha',
            //'tx_clave'=>'required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|',
            'tx_nombre'=>'required|regex:/^[\pL\s\-]+$/u',
            'cd_usuario_ext'=>'required',
            'cd_empresa'=>'required'
        ];
    }
    static function  returnMessagesUpd(){
        return $messages=[
            'cd_usuario.required'=>'Inserte un valor para este formulario',
            'tx_clave.required'=>'Inserte un valor para este formulario',
            'tx_nombre.required'=>'Inserte un valor para este formulario.',
            'cd_usuario_ext.required'=>'Inserte un valor para este formulario.',
            'cd_empresa.required'=>'Inserte un valor para este formulario.',
            'cd_usuario.regex'=>'El texto no concuerda con expresión regular.',
            'tx_clave.regex'=>'El texto no concuerda con expresión regular.',
            'tx_nombre.alpha'=>'El texto no concuerda con expresión regular.',
            'cd_usuario_ext.alpha'=>'El texto no concuerda con expresión regular.'
        ];
    }
    static function returnValidations(){
        return $validations=[
            'cd_usuario'=>'required|unique:pgsql.nucleo.usuarios|alpha',
            'tx_clave'=>'required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|',
            'tx_nombre'=>'required|regex:/^[\pL\s\-]+$/u',
            'cd_usuario_ext'=>'required|alpha',
            'cd_empresa'=>'required|exists:pgsql.nucleo.empresas'
        ];
    }
    static function  returnMessages(){
        return $messages=[
            'cd_usuario.required'=>'Inserte un valor para este formulario',
            'cd_usuario.unique'=>'El valor ya existe en nuestra base de datos.',
            'cd_usuario.alpha'=>'Solo se permiten letras para este formulario.',
            'tx_clave.required'=>'Inserte un valor para este formulario',
            'tx_clave.regex'=>'El patrón debe contener al menos letras,numeros y caracteres especiales',
            'tx_nombre.required'=>'Inserte un valor para este formulario.',
            'tx_nombre.regex'=>'Solo se permiten letras para este formulario.',
            'cd_usuario_ext.alpha'=>'Solo se permiten letras para este formulario.',
            'cd_usuario_ext.required'=>'Inserte un valor para este formulario.',
            'cd_empresa.required'=>'Inserte un valor para este formulario.',
            'cd_empresa.exists'=>'El registro insertado no existe en nuestros datos.',
            'cd_usuario.regex'=>'El texto no concuerda con expresión regular.',
            'tx_clave.regex'=>'El texto no concuerda con expresión regular.',
            'tx_nombre.alpha'=>'El texto no concuerda con expresión regular.',
            'cd_usuario_ext.alpha'=>'El texto no concuerda con expresión regular.'
        ];
    } 	
}
