<?php

namespace App\nucleo;

use Illuminate\Database\Eloquent\Model;

class RolesModel extends Model
{
    protected $table="nucleo.roles";
    protected $fillable=['cd_rol','tx_rol'];
    public $timestamps = false;
    public $incrementing = false;
    static function returnValidationsUpd(){
        return $validations=[
            //'tx_clave'=>'required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|',
            'tx_rol'=>'required|regex:/^[\pL\s\-]+$/u'
        ];
    }
    static function  returnMessagesUpd(){
        return $messages=[
            'tx_rol.regex'=>'Solo se permiten letras para este formulario.',
        ];
    }
    static function returnValidations(){
        return $validations=[
            'cd_rol'=>'required|regex:/^[\pL\s\-]+$/u|unique:pgsql.nucleo.roles',
            'tx_rol'=>'required|regex:/^[\pL\s\-]+$/u'
        ];
    }
    static function  returnMessages(){
        return $messages=[
            'tx_rol.regex'=>'Solo se permiten letras para este formulario.',
            'tx_rol.required'=>'Inserte un valor para este formulario',
            'cd_rol.regex'=>'Solo se permiten letras para este formulario.',
            'cd_rol.required'=>'Inserte un valor para este formulario',
            'cd_rol.unique'=>'El valor insertado existe en nuestros registros.',
        ];
    } 	
}
