<?php

namespace App\nucleo;

use Illuminate\Database\Eloquent\Model;

class EstructuraModel extends Model{

	protected $table="nucleo.estructura";
	protected $primaryKey="cd_estructura";
	protected $fillable=['cd_configuracion','tx_inicio','tx_fin','tx_columna','tx_patron_regular','tx_valor_defecto','tx_objeto_cobro_entrada','tx_objeto_cobro_salida','tp_registro','tx_nombre','tx_orientacion_relleno','tx_relleno','cd_banco','tx_consecutivo_registro','tx_clase_objeto','tx_funcion_cobro'];
	
}
