var varNombreSolicitud=$('input[name="valorSolicitud3"]').val();
if(varNombreSolicitud){
	$.ajax({
		url:'/'+varNombreSolicitud+'.consultar',
		method:'GET',
	}).done(function(response){
		var datatable=$('table[id="dt-mostrar-valores-menurol"]').DataTable({
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
				response[i].cd_rol,
				response[i].tx_menu,
				'<button class="btn btn-default" onclick="funcLlenarFormularioUpdate(\''+response[i].id+'\',\'/menurol.consultar.reg/\',\'-menurol\')">Actualizar</button>'+
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

function funcEsconderDatatableMenuRol(){
	var varContenidoDiv=$('div[id="sl-contenido-menurol"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="cr-contenido-menurol"]');
	varContenidoDiv.show(500);
}
function funcEsconderFormularioMenuRol(){
	var varContenidoDiv=$('div[id="cr-contenido-menurol"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="sl-contenido-menurol"]');
	varContenidoDiv.show(500);
}
function funcEsconderFormularioActualizarMenuRol(){
    var varContenidoDiv=$('div[id="ac-contenido-menurol"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="sl-contenido-menurol"]');
	varContenidoDiv.show(500);
}
