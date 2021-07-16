<?php

namespace App\nucleo;

use Illuminate\Database\Eloquent\Model;

class MenuRolModel extends Model
{
    protected $table="nucleo.menu_rol";
    protected $fillable=['id','cd_rol','cd_menu'];
    public $timestamps = false;
    static function returnValidationsUpd(){
        return $validations=[
            'cd_rol'=>'required',
            'cd_menu'=>'required'
        ];
    }
    static function  returnMessagesUpd(){
        return $messages=[
            'cd_rol.required'=>'Inserte un valor para este formulario',
            'cd_menu.required'=>'Inserte un valor para este formulario'
        ];
    }
    static function returnValidations(){
        return $validations=[
            'cd_rol'=>'required',
            'cd_menu'=>'required'
        ];
    }
    static function  returnMessages(){
        return $messages=[
            'cd_rol.required'=>'Inserte un valor para este formulario',
            'cd_menu.required'=>'Inserte un valor para este formulario'
        ];
    } 	
}
