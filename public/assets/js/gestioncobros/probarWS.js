function funcProbarWS(){
	var hostName="http://localhost:8081";
	$.ajax({
		url:hostName+'/GENCOB.EXT/PROD.TESTCONNECTION',
		
	}).done(function(response){
		console.log(response);
		var habilitarErrorDiv=$('div[id="form-gestioncobros-error"]');
		var habilitarDiv=$('div[id="form-gestioncobros"]');
		habilitarDiv.show();
		habilitarErrorDiv.hide();

	}).fail(function(a,b,c){
		console.log(a);
		console.log(b);
		console.log(c);
		var habilitarDiv=$('div[id="form-gestioncobros"]');
		var habilitarErrorDiv=$('div[id="form-gestioncobros-error"]');
		habilitarErrorDiv.show();
		habilitarDiv.hide();
	});
}

/*<dependency>
			<groupId>com.oracle.database.jdbc</groupId>
			<artifactId>ojdbc8</artifactId>
			<scope>runtime</scope>
		</dependency>/*/