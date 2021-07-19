<?php

namespace App\nucleo;

use Illuminate\Database\Eloquent\Model;

class EmpresasModel extends Model{

    protected $table="nucleo.empresas";
    protected $primaryKey="cd_empresa";
    protected $fillable=['tx_empresa','tp_documento','tx_documento','st_registro','tx_icono'];
    protected $attributes  =['st_registro'=>1];
    public $timestamps = false;
    
    static function returnValidationsUpd(){
        return $validations=[
            'tx_empresa'=>'required',
            'tp_documento'=>'required|numeric',
            'tx_documento'=>'required|numeric',
            'tx_icono'=>'required',
        ];
    }
    static function  returnMessagesUpd(){
        return $messages=[
            'tx_empresa.required'=>'Inserte un valor para este formulario',
            'tp_documento.required'=>'Inserte un valor para este formulario',
            'tx_documento.required'=>'Inserte un valor para este formulario',
            'tx_icono.required'=>'Inserte un valor para este formulario',
            'tp_documento.numeric'=>'El valor de ser numerico ',
            'tx_documento.numeric'=>'El valor de ser numerico '

        ];
    }
    static function returnValidations(){
        return $validations=[
            'tx_empresa'=>'required|unique:pgsql.nucleo.empresas',
            'tp_documento'=>'required|numeric',
            'tx_documento'=>'required|numeric',
            'tx_icono'=>'required',
        ];
    }
    static function  returnMessages(){
        return $messages=[
            'tx_empresa.required'=>'Inserte un valor para este formulario',
            'tp_documento.required'=>'Inserte un valor para este formulario',
            'tx_documento.required'=>'Inserte un valor para este formulario',
            'tx_icono.required'=>'Inserte un valor para este formulario',
            'tp_documento.numeric'=>'El valor de ser numerico ',
            'tx_documento.numeric'=>'El valor de ser numerico ',
            'tx_empresa.unique'=>'El valor insertado existe en nuestros registros. ',

        ];
    } 
}
