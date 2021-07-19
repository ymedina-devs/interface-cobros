@include('layout.sidebar')
@include('layout.header')

    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <input type="text" name="valorSolicitud" value="ordenes" hidden>
                    <div class="main-body">
                        <div class="page-wrapper">
                            @include('ordenes.tablaMostrarOrdenes')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@include('layout.footer',['varScript'=>'<script src="assets/js/ordenes/mostrarOrdenes.js"></script><script src="assets/js/nucleo/insertarFormulario.js"></script>'])