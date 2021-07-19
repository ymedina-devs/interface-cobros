var varNombreSolicitud=$('input[name="valorSolicitud"]').val();
if(varNombreSolicitud){
	$.ajax({
		url:'/'+varNombreSolicitud+'.consultar',
		method:'GET',
	}).done(function(response){
		var datatable=$('table[id="dt-mostrar-valores-ordenes"]').DataTable({
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
			if(response[i].st_proceso==1){
				varEstatus='<i class="feather icon-pause-circle text-c-gray f-20 m-r-10"></i>';
			}
			if(response[i].st_proceso==2){
				varEstatus='<i class="feather icon-play-circle text-c-red f-20 m-r-10"></i>';
			}
			if(response[i].st_proceso==3){
				varEstatus='<i class="feather icon-check-circle text-c-green f-20 m-r-10"></i>';
			}
			if(response[i].tx_nombre_salida){
				varDescarga='<i class="feather icon-download text-c-green f-20 m-r-10"></i> '+'<a href="#">'+response[i].tx_nombre_salida+'</a>';
			}
			datatable.row.add([
				response[i].cd_orden,
				response[i].tx_programa,
				response[i].tx_descripcion,
				response[i].fe_proceso,
				varDescarga,
				varEstatus
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

function funcEsconderDatatableOrdenes(){
	var varContenidoDiv=$('div[id="sl-contenido-ordenes"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="cr-contenido-ordenes"]');
	varContenidoDiv.show(500);
}
function funcEsconderFormularioOrdenes(){
	var varContenidoDiv=$('div[id="cr-contenido-ordenes"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="sl-contenido-ordenes"]');
	varContenidoDiv.show(500);
}
function funcEsconderFormularioActualizarOrdenes(){
    var varContenidoDiv=$('div[id="ac-contenido-ordenes"]');
	varContenidoDiv.hide(500);
	var varContenidoDiv=$('div[id="sl-contenido-ordenes"]');
	varContenidoDiv.show(500);
}
