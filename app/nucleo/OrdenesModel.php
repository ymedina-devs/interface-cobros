<?php

namespace App\nucleo;

use Illuminate\Database\Eloquent\Model;

class OrdenesModel extends Model{
    protected $table="colas.ordenes";
    protected $primaryKey="cd_orden";
    protected $fillable=['cd_programa','fe_proceso','st_proceso','tp_orden','parametro1'
,'parametro2','parametro3','parametro4','parametro5','parametro6','fe_desde','fe_hasta','fe_desde1','fe_hasta1','tp_reporte',
'cd_usuario','cd_empresa','tx_nombre_salida','tx_directorio_salida'];
    protected $attributes  =['st_proceso'=>1];
    public $timestamps = false;
    static function returnValidationsUpd(){
        return $validations=[
            'cd_programa'=>'required|exists:pgsql.colas.programas',
            'tp_reporte'=>'required',
            'cd_usuario'='required|exists:pgsql.nucleo.usuarios',
            'cd_empresa'='required|exists:pgsql.nucleo.empresas'
        ];
    }
    static function  returnMessagesUpd(){
        return $messages=[
            'cd_programa.required'=>'Inserte un valor para este formulario',
            'tp_reporte.required'=>'Inserte un valor para este formulario'
            'cd_usuario.required'=>'Inserte un valor para este formulario',
            'cd_empresa.required'=>'Inserte un valor para este formulario'
        ];
    }
    static function returnValidations(){
        return $validations=[
            'cd_programa'=>'required|exists:pgsql.colas.programas',
            'tp_reporte'=>'required',
            'cd_usuario'='required|exists:pgsql.nucleo.usuarios',
            'cd_empresa'='required|exists:pgsql.nucleo.empresas'
        ];
    }
    static function  returnMessages(){
        return $messages=[
            'cd_programa.required'=>'Inserte un valor para este formulario',
            'tp_reporte.required'=>'Inserte un valor para este formulario'
            'cd_usuario.required'=>'Inserte un valor para este formulario',
            'cd_empresa.required'=>'Inserte un valor para este formulario',
            'cd_empresa.exists'=>'La empresa que está realizando la solicitud no existe.',
            'cd_empresa.exists'=>'El Usuario que está realizando la solicitud no existe.'
        ];
    } 
}
