<div class="row">
    <!-- [ badge ] start -->
    
    <div class="col-sm-12">
        <div id="sl-contenido-tablacodigo" >
        <div class="card">
            <div class="card-header">
                <h5>Descripción de la Empresa: {{$varEmpresas[0]->tx_empresa}}</h5>
            </div>
            <div class="card-body">
                <table>
                    <tr>
                        <div class="row">
                            <div class="col-md-4">
                               <label for="">Nombre de la Empresa:</label>
                                
                                <br>
                                <h6>{{$varEmpresas[0]->tx_empresa}}</h6>
                            </div>
                       
                        
                            <div class="col-md-4">
                                
                                <label for="">Documento Asociado a la Empresa</label>
                                <br>
                                <h6>{{$varEmpresas[0]->tx_valor.'-'.$varEmpresas[0]->tx_documento}}</h6>
                            </div>
                        
                        
                            <div class="col-md-4">
                                <label for="">Icono de la Empresa</label>
                                <br>
                                <h6>{{$varEmpresas[0]->tx_icono}}</h6>
                            </div>
                            <div class="col-md-12">
                                <br>
                            </div>
                            <div class="col-md-4">
                            <label for="">Direccion de la Empresa:</label>
                            </div>

                            <div class="col-md-4">
                            <label for="">Teléfonos de la Empresa:</label>
                            </div>
                        </div>
                        
                        
                        
                        
                    </tr>
                </table>
            </div>
        </div>
        </div>
    </div>
    
    <!-- [ badge ] end -->
</div>