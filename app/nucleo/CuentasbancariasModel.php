<?php

namespace App\nucleo;

use Illuminate\Database\Eloquent\Model;
use Session;

class CuentasbancariasModel extends Model
{
    protected $table="nucleo.cuentasbancarias";
    protected $fillable=['cd_empresa','tx_cuenta','cd_banco','nu_lote','tx_ruta','tx_afiliacion','tx_carta','st_registro','tx_nombre_archivo_salida','st_registro'];
    public $timestamps = false;
    public $primaryKey='cd_cuentabancaria';
    public $attributes=['st_registro'=>1];
    static function returnValidationsUpd(){
        return $validations=[
            'cd_empresa'=>'required|numeric',
            'tx_cuenta'=>'required|regex:/^[0-9]+$/',
            'cd_banco'=>'required|numeric',
            'nu_lote'=>'required|numeric',
            'tx_ruta'=>'required',
            'tx_afiliacion'=>'required|numeric',
            'tx_carta'=>'required|numeric'
        ];
    }
    static function  returnMessagesUpd(){
        return $messages=[
            'cd_banco.required'=>'Inserte un valor para este formulario',
            'tx_banco.required'=>'Inserte un valor para este formulario',
            'cd_verificador.required'=>'Inserte un valor para este formulario',
            'cd_banco.numeric'=>'El valor de ser numerico y menor igual a 2 digitos.',
            'tx_banco.regex'=> 'El valor no debe contener espacios " ", ni números.',
            'cd_verificador.numeric'=>'El valor debe ser numerico y menor igual a 4 digitos.'

        ];
    }
    static function returnValidations(){
        return $validations=[
           	'cd_empresa'=>'required|numeric',
            'tx_cuenta'=>'required|regex:/^[0-9]+$/|min:20',
            'cd_banco'=>'required|numeric',
            'nu_lote'=>'required|numeric',
            'tx_ruta'=>'required',
            'tx_afiliacion'=>'required|numeric',
            'tx_carta'=>'required|numeric',
            'tx_nombre_archivo_salida'=>'required'
        ];
    }
    static function  returnMessages(){
        return $messages=[
            'cd_empresa.required'=>'Inserte un valor para este formulario.',
            'tx_cuenta.required'=>'Inserte un valor para este formulario.',
            'cd_banco.required'=>'Inserte un valor para este formulario.',
            'nu_lote.required'=>'Inserte un valor para este formulario.',
            'tx_ruta.required'=>'Inserte un valor para este formulario.',
            'tx_afiliacion.required'=>'Inserte un valor para este formulario.',
            'tx_carta.required'=>'Inserte un valor para este formulario.',
            'tx_nombre_archivo_salida.required'=>'Inserte un valor para este formulario.',

            'tx_cuenta.regex'=>'El valor debe ser numerico.',
            'cd_empresa.numeric'=>'El valor debe ser numerico y menor igual a 2 digitos.',
            'cd_banco.numeric'=>'El valor debe ser numerico y menor igual a 2 digitos.',
            'nu_lote.numeric'=>'El valor debe ser numerico y menor igual a 2 digitos.',
            'tx_afiliacion.numeric'=>'El valor debe ser numerico y menor igual a 2 digitos.',
            'tx_carta.numeric'=>'El valor debe ser numerico y menor igual a 2 digitos.',
            'tx_cuenta.min'=>'El valor debe tener al menos 20 caracteres.	'


        ];
    } 
}
