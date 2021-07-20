 <!-- [ Main Content ] start -->
 <div class="row">
    <!-- [ badge ] start -->
    
    <div class="col-sm-12">
        <div id="sl-contenido-estructura" >
        <div class="card">
            <div class="card-header">
                <h5>Tabla de Estructura de Archivos del Sistema</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Banco</label>
                            <select class="form-control" name="cd_banco">
                            
                            @if($varBancos)
                                @foreach($varBancos as $banco)
                                <option value="{{$banco->cd_banco}}">{{$banco->tx_banco}}</option>
                                @endforeach
                            @endif
                            </select>
                        </div>
                        
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Tipo de Archivo</label>
                            <select class="form-control" name="tp_registro">
                            
                            @if($varTablacodigo)
                                @foreach($varTablacodigo as $tablacodigo)
                                <option value="{{$tablacodigo->cd_modulo}}">{{$tablacodigo->tx_valor}}</option>
                                @endforeach
                            @endif
                            </select>
                        </div>
                        
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Tipo Registro</label>
                            <select class="form-control" name="tp_archivo">
                            
                            @if($varTablacodigo)
                                @foreach($varTablacodigo2 as $tablacodigo)
                                <option value="{{$tablacodigo->cd_modulo}}">{{$tablacodigo->tx_valor}}</option>
                                @endforeach
                            @endif
                            </select>
                        </div>
                        
                    </div>
                    <div class="col-md-3">
                        <label for="">_</label>
                        <button class="btn btn-info form-control" onclick="funcGenerarBusqueda()">Generar Búsqueda</button>
                    </div>
                </div>
                <div id="tablaEstructura"></div>
            </div>
        </div>
        </div>
    </div>
    
    <!-- [ badge ] end -->
</div>