var varNombreSolicitud=$('input[name="valorSolicitud"]').val();
if(varNombreSolicitud){
	$.ajax({
		url:'/'+varNombreSolicitud+'.consultar',
		method:'GET',
	}).done(function(response){
		var datatable=$('table[id="dt-mostrar-valores-configuracionarchivo"]').DataTable({
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
				response[i].tx_tipo,
				response[i].tx_formato,
				response[i].nu_lineas_cab,
				response[i].nu_lineas_det,
				response[i].nu_lineas_pie,
				response[i].tx_banco,
				response[i].tx_separador,
				response[i].tx_nombre_salida,
				'<button class="btn btn-default" onclick="funcLlenarFormularioUpdate(\''+response[i].cd_configuracion+'\',\'/configuracionarchivo.consultar.reg/\',\'-configuracionarchivo\')">Actualizar</button>'+
				'<button class="btn btn-dark" ">Eliminar</button>',
				]).draw(false);
		}
	}).fail(function(a,b,c){
		console.log(a);
		console.log(b);
		console.log(c);
	});
}else{
	console.log('Debe espcificar un valor de busqueda para el dt en la vista');
}

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


