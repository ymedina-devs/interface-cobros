@include('layout.sidebar')
@include('layout.header')

	<div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <input type="text" name="valorSolicitud" value="usuarios" hidden>
                    <div class="main-body">
                        <div class="page-wrapper">
                            
                            @include('usuarios.formularios.tablaMostrarUsuarios')
                            @include('usuarios.formularios.formularioInsertarUsuarios',['varEmpresas'=>$varEmpresas])
                            @include('usuarios.formularios.formularioActualizarUsuarios',['varEmpresas'=>$varEmpresas])
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@include('layout.footer',['varScript'=>'<script src="assets/js/usuarios/mostrar.js"></script><script src="assets/js/nucleo/insertarFormulario.js"></script></script><script src="assets/js/nucleo/actualizarFormulario.js"></script>'])