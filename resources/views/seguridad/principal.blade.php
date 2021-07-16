@include('layout.sidebar')
@include('layout.header')

	<div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <input type="text" name="valorSolicitud" value="menus" hidden>
                    <input type="text" name="valorSolicitud2" value="roles" hidden>
                    <input type="text" name="valorSolicitud3" value="menurol" hidden>
                    <div class="main-body">
                        <div class="page-wrapper">
                            
                            @include('seguridad.menus.tablaMostrarMenu')
                            @include('seguridad.menus.formularioInsertarMenus',['varMenus'=>$varMenuModel,'varTpMenu'=>$varTablaCodigoModel])
                            @include('seguridad.menus.formularioActualizarMenus',['varMenus'=>$varMenuModel,'varTpMenu'=>$varTablaCodigoModel])

                            @include('seguridad.menus.tablaMostrarRoles')
                            @include('seguridad.menus.formularioActualizarRoles')
                            @include('seguridad.menus.formularioInsertarRoles')

                            @include('seguridad.menus.tablaMostrarMenuRol')
                            @include('seguridad.menus.formularioInsertarMenuRol',['roles'=>$varRoles,'menus'=>$varMenus])
                            @include('seguridad.menus.formularioActualizarMenuRol',['roles'=>$varRoles,'menus'=>$varMenus])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@include('layout.footer',['varScript'=>'<script src="assets/js/nucleo/mostrar.js"></script>
<script src="assets/js/nucleo/mostrarRoles.js"></script><script src="assets/js/nucleo/insertarFormulario.js"></script></script><script src="assets/js/nucleo/actualizarFormulario.js"></script><script src="assets/js/nucleo/mostrarMenuRol.js"></script>'])