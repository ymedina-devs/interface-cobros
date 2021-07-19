function funcInsertarFormulario(varNombreFormulario,varUrl){  

    var varConfirmar=confirm('¿Está Seguro que Desea realizar esta operación?');
    if(varConfirmar==true){
        var inputCdVerificador='';
        var varValorAnteriorTxCuenta='';
        var inputTxCuenta='';
        if(varNombreFormulario=='cr-cuentasbancarias'){
            inputCdVerificador=$('input[name="cd_verificador"]').val();
            inputTxCuenta=$('input[name="tx_cuenta"]').val();
            varValorAnteriorTxCuenta=inputTxCuenta;
            var inputModificado=$('input[name="tx_cuenta"]').val(inputCdVerificador+inputTxCuenta);
        }
        var parametros={};
        var formulario= $('form[name="'+varNombreFormulario+'"]').serializeArray();
        var key = $('#_token').attr('content');
        for(var i=0;i<formulario.length; i++ ){
                var nombre=formulario[i].name;
                var valor=formulario[i].value;
                parametros[nombre]=valor;
                var elemento =$('div[id="'+nombre+'"]');
                elemento.html('');
        }
        $.ajax({
            type: "POST",
            url: varUrl,
            cache: false,
            data: parametros,
            headers: {'X-CSRF-TOKEN': key},
            success: function(response){ 
                var returnedData = JSON.parse(response);
                console.log(returnedData);
                if(returnedData.length>0){
                    for(var a=0;a<returnedData.length;a++){
                        var objectKeys=Object.keys(returnedData[a]);
                        for(var i=0;i<objectKeys.length;i++){
                            console.log(objectKeys[i]);
                        var elemento =$('div[id="'+objectKeys[i]+'"]');
                            elemento.append(
                                '<small id="emailHelp" class="form-text "style="color:red;">'+returnedData[a][objectKeys[i]]+'</small>'
                            );
                        }
                    }
                    if(varNombreFormulario=='cr-cuentasbancarias'){
                        var inputErrorValidacionCdVerificador=$('input[name="cd_verificador"]').val(inputCdVerificador);
                        var inputErrorValidacionTxCuenta=$('input[name="tx_cuenta"]').val(varValorAnteriorTxCuenta);
                    }
                }else{
                    alert('Se realizó el registro. Está siendo redireccionado. Clic a aceptar para continuar');
                    setTimeout(() => {  location.reload();}, 1000);
                }
                
            },
            error:function(error,a,b){
                console.log(error);
                console.log(a);
                console.log(b);
            }
        });
    }else{

    }
}

