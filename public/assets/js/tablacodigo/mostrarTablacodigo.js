var varNombreSolicitud=$('input[name="valorSolicitud"]').val();
if(varNombreSolicitud){
	$.ajax({
		url:'/'+varNombreSolicitud+'.consultar',
		method:'GET',
	}).done(function(response){
		var datatable=$('table[id="dt-mostrar-valores-tablacodigo"]').DataTable({
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
				response[i].cd_tabla,
				response[i].cd_modulo,
				response[i].tx_valor,
				'<button class="btn btn-default" onclick="funcLlenarFormularioUpdate(\''+response[i].cd_tabla_cod+'\',\'/tablacodigo.consultar.reg/\',\'-tablacodigo\')">Actualizar</button>'+
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

function funcEsconderDatatableTablacodigo(){
	var varContenidoDiv=$('div[id="sl-contenido-tablacodigo"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="cr-contenido-tablacodigo"]');
	varContenidoDiv.show(500);
}
function funcEsconderFormularioTablacodigo(){
	var varContenidoDiv=$('div[id="cr-contenido-tablacodigo"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="sl-contenido-tablacodigo"]');
	varContenidoDiv.show(500);
}
function funcEsconderFormularioActualizarTablacodigo(){
    var varContenidoDiv=$('div[id="ac-contenido-tablacodigo"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="sl-contenido-tablacodigo"]');
	varContenidoDiv.show(500);
}
