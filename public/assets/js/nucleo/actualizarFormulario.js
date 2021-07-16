function funcLlenarFormularioUpdate(varParametrosConsulta,varURl,varDiv){
    $.ajax({
        url:varURl+varParametrosConsulta,
        method:'GET',
    }).done(function(response){

        console.log(response);
        if(varDiv==undefined){
            varDiv='';
        }
        var varParseJSON=JSON.parse(response);
        var varContenidoDiv=$('div[id="sl-contenido'+varDiv+'"]');
	    varContenidoDiv.hide(500);
        for(var h=0;h<varParseJSON.length;h++){
            var varIndicesObjeto=Object.keys(varParseJSON[h]);
            for (var i = 0; i < varIndicesObjeto.length; i++) {
                console.log('ac'+varIndicesObjeto[i]);
                $('#ac'+varIndicesObjeto[i]).val(varParseJSON[h][varIndicesObjeto[i]]);
            }
        }
        
    }).fail(function(a,b,c){
		console.log(a);
		console.log(b);
		console.log(c);
	});;
    if(varDiv==undefined){
            varDiv='';
    }

    console.log('div[id="ac-contenido-'+varDiv);
    $('div[id="ac-contenido'+varDiv+'"]').show(500);
}
