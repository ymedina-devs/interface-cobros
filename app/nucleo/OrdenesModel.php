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
}
