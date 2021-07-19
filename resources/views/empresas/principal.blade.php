@include('layout.sidebar')
@include('layout.header')

    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <input type="text" name="valorSolicitud" value="empresas" hidden>
                    <div class="main-body">
                        <div class="page-wrapper">
                            @include('empresas.tablaMostrarEmpresas')
                            @include('empresas.formularioInsertarEmpresas',['documentos'=>$varTablaCodigoModel])
                            @include('empresas.formularioActualizarEmpresas',['documentos'=>$varTablaCodigoModel])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@include('layout.footer',['varScript'=>'
<script src="assets/js/empresas/mostrarEmpresas.js"></script><script src="assets/js/nucleo/insertarFormulario.js"></script></script><script src="assets/js/nucleo/actualizarFormulario.js"></script>'])