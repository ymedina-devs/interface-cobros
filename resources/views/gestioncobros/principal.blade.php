@include('layout.sidebar')
@include('layout.header')

    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <input type="text"  value="estructura" hidden>
                    <div class="main-body">
                        <div class="page-wrapper">
                           @include('gestioncobros.formularioPruebaConexionConWs')
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@include('layout.footer',['varScript'=>'<script src="assets/js/gestioncobros/probarWS.js"></script><script src="assets/js/nucleo/insertarFormulario.js"></script>'])