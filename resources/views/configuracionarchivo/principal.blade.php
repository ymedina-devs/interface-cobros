@include('layout.sidebar')
@include('layout.header')

    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <input type="text" name="valorSolicitud" value="configuracionarchivo" hidden>
                    <div class="main-body">
                        <div class="page-wrapper">
                            @include('configuracionarchivo.tablaMostrarConfiguracionArchivo')
                            @include('configuracionarchivo.formularioInsertarConfiguracionArchivo',['varTablacodigo'=>$varTablacodigo,'varTablacodigo1'=>$varTablacodigo1])
                            @include('configuracionarchivo.formularioActualizarConfiguracionArchivo',['varTablacodigo'=>$varTablacodigo,'varTablacodigo1'=>$varTablacodigo1])

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@include('layout.footer',['varScript'=>'<script src="assets/js/estructura/mostrarEstructura.js"></script><script src="assets/js/nucleo/insertarFormulario.js"></script></script><script src="assets/js/nucleo/actualizarFormulario.js"></script>'])