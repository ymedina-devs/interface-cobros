<?php

namespace App\nucleo;

use Illuminate\Database\Eloquent\Model;

class ConfiguracionArchivoModel extends Model
{
    protected $table="nucleo.configuracion_archivo";
    protected $primaryKey="cd_configuracion";
    public $timestamps = false;
    protected $fillable=['tx_tipo','tx_formato','nu_lineas_cab','nu_lineas_det','nu_lineas_pie','cd_banco','tx_separador','tx_nombre_salida'];
    static function returnValidationsUpd(){
        return $validations=[
            'tx_tipo'=>'required',
            'tx_formato'=>'required',
            'nu_lineas_cab'=>'required|numeric',
            'nu_lineas_det'=>'required|numeric',
            'nu_lineas_pie'=>'required|numeric',
            'cd_banco'=>'required|numeric',
            'tx_nombre_salida'=>'required'
        ];
    }
    static function  returnMessagesUpd(){
        return $messages=[
            'tx_tipo.required'=>'Inserte un valor para este formulario.',
            'tx_formato.required'=>'Inserte un valor para este formulario.',
            'nu_lineas_cab.required'=>'Inserte un valor para este formulario.',
            'nu_lineas_det.required'=>'Inserte un valor para este formulario.',
            'nu_lineas_pie.required'=>'Inserte un valor para este formulario.',
            'cd_banco.required'=>'Inserte un valor para este formulario.',
            'tx_separador.required'=>'Inserte un valor para este formulario.',

            'nu_lineas_cab.numeric'=>'El valor debe ser numerico.',
            'nu_lineas_det.numeric'=>'El valor debe ser numerico.',
            'nu_lineas_pie.numeric'=>'El valor debe ser numerico.',
            'cd_banco.numeric'=>'El valor debe ser numerico.',

            'tx_nombre_salida.unique'=>'El valor insertado existe en nuestros registros.',
        ];
    }
    static function returnValidations(){
        return $validations=[
            'tx_tipo'=>'required',
            'tx_formato'=>'required',
            'nu_lineas_cab'=>'required|numeric',
            'nu_lineas_det'=>'required|numeric',
            'nu_lineas_pie'=>'required|numeric',
            'cd_banco'=>'required|numeric',
            'tx_separador'=>'required',
            'tx_nombre_salida'=>'required|unique:pgsql.nucleo.configuracion_archivo'
        ];
    }
    static function  returnMessages(){
        return $messages=[
            'tx_tipo.required'=>'Inserte un valor para este formulario.',
            'tx_formato.required'=>'Inserte un valor para este formulario.',
            'nu_lineas_cab.required'=>'Inserte un valor para este formulario.',
            'nu_lineas_det.required'=>'Inserte un valor para este formulario.',
            'nu_lineas_pie.required'=>'Inserte un valor para este formulario.',
            'cd_banco.required'=>'Inserte un valor para este formulario.',
            'tx_separador.required'=>'Inserte un valor para este formulario.',

            'nu_lineas_cab.numeric'=>'El valor debe ser numerico.',
            'nu_lineas_det.numeric'=>'El valor debe ser numerico.',
            'nu_lineas_pie.numeric'=>'El valor debe ser numerico.',
            'cd_banco.numeric'=>'El valor debe ser numerico.',

            'tx_nombre_salida.unique'=>'El valor insertado existe en nuestros registros.',

        ];
    } 
}
