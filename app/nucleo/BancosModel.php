<?php

namespace App\nucleo;

use Illuminate\Database\Eloquent\Model;

class BancosModel extends Model{

    protected $table="nucleo.bancos";
    protected $fillable=['cd_banco','tx_banco','cd_verificador','st_registro'];
    protected $attributes  =['st_registro'=>1];
    public $timestamps = false;
    public $incrementing=false;
    static function returnValidationsUpd(){
        return $validations=[
            'cd_banco'=>'required|numeric|max:99',
            'tx_banco'=>'required|regex:/^[\pL\s\-]+$/u',
            'cd_verificador'=>'required|numeric|min:4'
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
            'cd_banco'=>'required|unique:pgsql.nucleo.bancos|numeric|max:99',
            'tx_banco'=>'required|unique:pgsql.nucleo.bancos|regex:/^[\pL\s\-]+$/u',
            'cd_verificador'=>'required|unique:pgsql.nucleo.bancos|numeric|min:4'
        ];
    }
    static function  returnMessages(){
        return $messages=[
            'cd_banco.required'=>'Inserte un valor para este formulario.',
            'tx_banco.required'=>'Inserte un valor para este formulario.',
            'cd_verificador.required'=>'Inserte un valor para este formulario..',
            'cd_banco.numeric'=>'El valor debe ser numerico y menor igual a 2 digitos.',
            'tx_banco.regex'=> 'El valor no debe contener espacios " ", ni números.',
            'cd_verificador.numeric'=>'El valor debe ser numerico y menor igual a 4 digitos.',
            'cd_banco.unique'=>'El valor insertado existe en nuestros registros.',
            'tx_banco.unique'=>'El valor insertado existe en nuestros registros.',
            'cd_verificador.unique'=>'El valor insertado existe en nuestros registros.'

        ];
    } 
}
