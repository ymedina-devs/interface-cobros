 <!-- [ Main Content ] start -->
 <div class="row">
    <!-- [ badge ] start -->
    
    <div class="col-sm-12">
        <div id="sl-contenido-cuentasbancarias" >
        <div class="card">
            <div class="card-header">
                <h5>Tabla de CuentasBancarias de: {{$varEmpresas[0]->tx_empresa}}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped " id="dt-mostrar-valores-cuentasbancarias" class="display" style="width:100%">
                        <button class="btn btn-success" onclick="funcEsconderDatatableCuentasbancarias()">Asociar Cuenta Bancaria</button>
                        <thead> 
                            <tr>
                                <th>Banco</th>
                                <th>Cuenta Bancaria</th>
                                <th>Consecutivo de Envío</th>
                                <th>Ruta de Almacenamiento</th>
                                <th>¿Genera Afiliación?</th>
                                <th>¿Genera Carta?</th>
                                <th>Nombre de Salida</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
    
    <!-- [ badge ] end -->
</div>