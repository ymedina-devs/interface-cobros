
function funcEsconderDatatableConfiguracionarchivo(){
	var varContenidoDiv=$('div[id="sl-contenido-configuracionarchivo"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="cr-contenido-configuracionarchivo"]');
	varContenidoDiv.show(500);
}
function funcEsconderFormularioConfiguracionarchivo(){
	var varContenidoDiv=$('div[id="cr-contenido-configuracionarchivo"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="sl-contenido-configuracionarchivo"]');
	varContenidoDiv.show(500);
}
function funcEsconderFormularioActualizarConfiguracionarchivo(){
    var varContenidoDiv=$('div[id="ac-contenido-configuracionarchivo"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="sl-contenido-configuracionarchivo"]');
	varContenidoDiv.show(500);
}
function funcTransferirValorInputTxFormato(){

	var varSelectTxTipo=$('select[name="tx_tipo_temp"] option:selected').val();
	var varSplitValorSelect=varSelectTxTipo.split('-');
	var varInputTxFormato=$('input[name="tx_formato"]');
	var varInputTxTxTipo=$('input[name="tx_tipo"]');
	varInputTxTxTipo.val(varSplitValorSelect[1]);
	varInputTxFormato.val(varSplitValorSelect[0]);
}
function funcTransferirValorInputTxFormato(){

	var varSelectTxTipo=$('select[name="actx_tipo_temp"] option:selected').val();
	var varSplitValorSelect=varSelectTxTipo.split('-');
	var varInputTxFormato=$('input[name="tx_formato"]');
	var varInputTxTxTipo=$('input[name="tx_tipo"]');
	varInputTxTxTipo.val(varSplitValorSelect[1]);
	varInputTxFormato.val(varSplitValorSelect[0]);
}

function funcGenerarBusqueda(){
	var divTablaEstructura=$('div[id="tablaEstructura"]');
	var selectBanco=$('select[name="cd_banco"] option:selected').val();
	var selectTpRegistro=$('select[name="tp_registro"] option:selected').val();
	var selectTpArchivo=$('select[name="tp_archivo"] option:selected').val();
	divTablaEstructura.html('');
	var tablaHtml='<div class="table-responsive">'+
		'<button class="btn btn-success" onclick="funcEsconderDatatableEstructura()">Registar Estructura</button>'+
		'<table class="table table-striped " id="dt-mostrar-valores-estructura" class="display" style="width:100%">'+
			'<thead>' +
				'<tr>'+
					'<th>Tipo de Archivo</th>'+
					'<th>Caracter de Inicio</th>'+
					'<th>Caracter de Inicio</th>'+
					'<th>Número de Columna</th>'+
					'<th>Patrón Regular</th>'+
					'<th>Valor por Defecto</th>'+
					'<th>Objeto de Entrada</th>'+
					'<th>Objeto de Salida</th>'+
					'<th>Tipo de Registro</th>'+
					'<th>Nombre de la Columna</th>'+
					'<th>Orientación Relleno</th>'+
					'<th>Relleno</th>'+
					'<th>Banco</th>'+
					'<th>Función de Cobro</th>'+
					'<th>Objeto de Cobro</th>'+
				'</tr>'+
			'</thead>'+
		'</table>'+
	'</div>';
	divTablaEstructura.append(tablaHtml);
	var Url='/estructura.consultar/'+selectBanco+'/'+selectTpRegistro+'/'+selectTpArchivo;
	$.ajax({
		url:Url,
		method:'GET',
	}).done(function(response){
		var datatable=$('table[id="dt-mostrar-valores-estructura"]').DataTable({
			"lengthChange": false,
			"bInfo": false,
			"language": {
		      "emptyTable": "No existen registros para mostrar",
		      "search":"Filtar por palabra:",
		      "paginate": {
		      	"previous": "Anterior",
		      	"next":"Siguiente"
		    	}
		    },
		    "bAutoWidth": false,
		    "ordering": false,
		    "pageLength": 5
		});
		for(var i=0;i<response.length;i++){
			var varEstatus="";
			var varDescarga="";
			datatable.row.add([
				response[i].tx_valor1,
				response[i].tx_inicio,
				response[i].tx_fin,
				response[i].tx_columna,
				response[i].tx_patron_regular,
				response[i].tx_valor_defecto,
				response[i].tx_objeto_cobro_entrada,
				response[i].tx_objeto_cobro_salida,
				response[i].tx_valor2,
				response[i].tx_nombre,
				response[i].tx_orientacion_relleno,
				response[i].tx_relleno,
				response[i].tx_banco,
				response[i].tx_funcion_cobro,
				response[i].tx_clase_objeto
				]).draw(false);
		}
	}).fail(function(a,b,c){
		console.log('/estructura.consultar/'+selectBanco+'/'+selectTpRegistro+'/'+selectTpArchivo);
		console.log(a);
		console.log(b);
		console.log(c);
	});
}


