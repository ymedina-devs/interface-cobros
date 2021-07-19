<?php

namespace App\nucleo;

use Illuminate\Database\Eloquent\Model;

class TablaCodigoModel extends Model
{
    protected $table='nucleo.tablacodigo';
    protected $fillable=['cd_modulo','cd_tabla','tx_valor','st_tabla'];
    protected $primaryKey="cd_tabla_cod";
    protected $attributes  =['st_tabla'=>1];
    public $timestamps = false;
     static function returnValidationsUpd(){
        return $validations=[
            'tx_valor'=>'required',
            'cd_modulo'=>'required|numeric',
            'cd_tabla'=>'required'
        ];
    }
    static function  returnMessagesUpd(){
        return $messages=[
            'tx_valor.required'=>'Inserte un valor para este formulario',
            'cd_modulo.required'=>'Inserte un valor para este formulario',
            'cd_tabla.required'=>'Inserte un valor para este formulario',
            'cd_tabla.numeric'=>'El valor de ser numerico.',

        ];
    }
    static function returnValidations(){
        return $validations=[
            'tx_valor'=>'required',
            'cd_modulo'=>'required|numeric',
            'cd_tabla'=>'required'
        ];
    }
    static function  returnMessages(){
        return $messages=[
            'tx_valor.required'=>'Inserte un valor para este formulario',
            'cd_modulo.required'=>'Inserte un valor para este formulario',
            'cd_tabla.required'=>'Inserte un valor para este formulario',
            'cd_tabla.numeric'=>'El valor de ser numerico.',

        ];
    } 
}
