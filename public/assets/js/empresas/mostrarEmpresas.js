var varNombreSolicitud=$('input[name="valorSolicitud"]').val();
if(varNombreSolicitud){
	$.ajax({
		url:'/'+varNombreSolicitud+'.consultar',
		method:'GET',
	}).done(function(response){
		var datatable=$('table[id="dt-mostrar-valores-empresas"]').DataTable({
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
				response[i].tx_empresa,
				response[i].tp_documento,
				response[i].tx_documento,
				response[i].tx_icono,
				'<button class="btn btn-default" onclick="funcLlenarFormularioUpdate(\''+response[i].cd_empresa+'\',\'/empresas.consultar.reg/\',\'-empresas\')">Actualizar</button>'+
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

function funcEsconderDatatableEmpresas(){
	var varContenidoDiv=$('div[id="sl-contenido-empresas"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="cr-contenido-empresas"]');
	varContenidoDiv.show(500);
}
function funcEsconderFormularioEmpresas(){
	var varContenidoDiv=$('div[id="cr-contenido-empresas"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="sl-contenido-empresas"]');
	varContenidoDiv.show(500);
}
function funcEsconderFormularioActualizarEmpresas(){
    var varContenidoDiv=$('div[id="ac-contenido-empresas"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="sl-contenido-empresas"]');
	varContenidoDiv.show(500);
}
