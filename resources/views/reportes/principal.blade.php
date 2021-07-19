@include('layout.sidebar')
@include('layout.header')

    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <input type="text" name="valorSolicitud" value="tablacodigo" hidden>
                    <div class="main-body">
                        <div class="page-wrapper">
                            @include('tablacodigo.tablaMostrarTablacodigo')
                            @include('tablacodigo.formularioInsertarTablacodigo')
                            @include('tablacodigo.formularioActualizarTablacodigo')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@include('layout.footer',['varScript'=>'
<script src="assets/js/tablacodigo/mostrarTablacodigo.js"></script><script src="assets/js/nucleo/insertarFormulario.js"></script></script><script src="assets/js/nucleo/actualizarFormulario.js"></script>'])