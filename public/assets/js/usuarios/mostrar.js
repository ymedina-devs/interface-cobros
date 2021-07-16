var varNombreSolicitud=$('input[name="valorSolicitud"]').val();
if(varNombreSolicitud){
	$.ajax({
		url:'/'+varNombreSolicitud+'.consultar',
		method:'GET',
	}).done(function(response){
		var datatable=$('table[id="dt-mostrar-valores"]').DataTable({
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
				response[i].cd_usuario,
				response[i].tx_nombre,
				response[i].cd_usuario_ext,
                response[i].tx_empresa,
				'<button class="btn btn-default" onclick="funcLlenarFormularioUpdate(\''+response[i].cd_usuario+'\',\'/usuarios.consultar.reg/\')">Actualizar</button>'+
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
function funcEsconderDatatable(){
	var varContenidoDiv=$('div[id="sl-contenido"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="cr-contenido"]');
	varContenidoDiv.show(500);
}
function funcEsconderFormulario(){
	var varContenidoDiv=$('div[id="cr-contenido"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="sl-contenido"]');
	varContenidoDiv.show(500);
}
function funcEsconderFormularioActualizar(){
    var varContenidoDiv=$('div[id="ac-contenido"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="sl-contenido"]');
	varContenidoDiv.show(500);
}
