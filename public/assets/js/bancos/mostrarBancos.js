var varNombreSolicitud=$('input[name="valorSolicitud"]').val();
if(varNombreSolicitud){
	$.ajax({
		url:'/'+varNombreSolicitud+'.consultar',
		method:'GET',
	}).done(function(response){
		var datatable=$('table[id="dt-mostrar-valores-bancos"]').DataTable({
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
				response[i].cd_banco,
				response[i].tx_banco,
				response[i].cd_verificador,
				'<button class="btn btn-default" onclick="funcLlenarFormularioUpdate(\''+response[i].cd_banco+'\',\'/bancos.consultar.reg/\',\'-bancos\')">Actualizar</button>'+
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

function funcEsconderDatatableBancos(){
	var varContenidoDiv=$('div[id="sl-contenido-bancos"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="cr-contenido-bancos"]');
	varContenidoDiv.show(500);
}
function funcEsconderFormularioBancos(){
	var varContenidoDiv=$('div[id="cr-contenido-bancos"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="sl-contenido-bancos"]');
	varContenidoDiv.show(500);
}
function funcEsconderFormularioActualizarBancos(){
    var varContenidoDiv=$('div[id="ac-contenido-bancos"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="sl-contenido-bancos"]');
	varContenidoDiv.show(500);
}
