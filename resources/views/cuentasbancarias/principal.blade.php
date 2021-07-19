@include('layout.sidebar')
@include('layout.header')

    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <input type="text" name="valorSolicitud" value="cuentasbancarias" hidden>
                    <div class="main-body">
                        <div class="page-wrapper">
                            @include('cuentasbancarias.tarjetaDescripcionEmpresa',['varEmpresas'=>$varEmpresas])
                            @include('cuentasbancarias.tablaMostrarCuentasbancarias',['varEmpresas'=>$varEmpresas])
                            @include('cuentasbancarias.formularioInsertarCuentasbancarias',['bancos'=>$varBancos,'varEmpresas'=>$varEmpresas])
                            @include('cuentasbancarias.formularioActualizarCuentasbancarias',['bancos'=>$varBancos,'varEmpresas'=>$varEmpresas])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@include('layout.footer',['varScript'=>'
<script src="assets/js/cuentasbancarias/mostrarCuentasbancarias.js"></script><script src="assets/js/nucleo/insertarFormulario.js"></script></script><script src="assets/js/nucleo/actualizarFormulario.js"></script>'])