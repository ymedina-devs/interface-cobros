var varNombreSolicitud=$('input[name="valorSolicitud"]').val();
if(varNombreSolicitud){
	$.ajax({
		url:'/'+varNombreSolicitud+'.consultar',
		method:'GET',
	}).done(function(response){
		var datatable=$('table[id="dt-mostrar-valores-cuentasbancarias"]').DataTable({
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
			datatable.row.add([
				response[i].tx_banco,
				response[i].tx_cuenta,
				response[i].nu_lote,
				response[i].tx_ruta,
				response[i].tx_afiliacion,
				response[i].tx_carta,
				response[i].tx_nombre_archivo_salida,
				'<button class="btn btn-default" onclick="funcLlenarFormularioUpdate(\''+response[i].cd_cuentabancaria+'\',\'/cuentasbancarias.consultar.reg/\',\'-cuentasbancarias\')">Actualizar</button>'+
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

function funcEsconderDatatableCuentasbancarias(){
	var varContenidoDiv=$('div[id="sl-contenido-cuentasbancarias"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="cr-contenido-cuentasbancarias"]');
	varContenidoDiv.show(500);
}
function funcEsconderFormularioCuentasbancarias(){
	var varContenidoDiv=$('div[id="cr-contenido-cuentasbancarias"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="sl-contenido-cuentasbancarias"]');
	varContenidoDiv.show(500);
}
function funcEsconderFormularioActualizarCuentasbancarias(){
    var varContenidoDiv=$('div[id="ac-contenido-cuentasbancarias"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="sl-contenido-cuentasbancarias"]');
	varContenidoDiv.show(500);
}
function funcBuscarVerificadoPorBanco(){
	var selectCodigoBanco=$('select[name="cd_banco"] option:selected').val();
	$.ajax({
		url:'/cuentasbancarias.buscarverificadobanco/'+selectCodigoBanco,

	}).done(function(response){
		var formularioCuentabancaria=$('input[name="cd_verificador"]');
		formularioCuentabancaria.val(response[0].cd_verificador);
	});
}
