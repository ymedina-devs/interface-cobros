 <!-- [ Main Content ] start -->
 <div class="row">
    <!-- [ badge ] start -->
    
    <div class="col-sm-12">
        <div id="sl-contenido-estructura" >
        <div class="card">
            <div class="card-header">
                <h5>Carga de Cobros de clientes Externo</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 offset-4" id="boton-probarws">
                        <button class="btn btn-success form-control" onclick="funcProbarWS()">Solicitar Estatus Servicio de Extracción de Data</button>
                       
                    </div>
                </div>
                <hr>
            </div>

            
        </div>
        <div class="card">
             <div id="form-gestioncobros-error" style="display: none;">
                <div class="card-body">
                    <h5><center>El Servicio no Está Disponible, Comuníquese con el Área de Tecnología y Sistemas</center></h5>
                </div>    
            </div>
             <div id="form-gestioncobros" style="display: none;">
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Seleccionar Producto</label>
                            <select class="form-control" name="tx_parametro1" required>
                            
                            @if($varCodigos)
                                @foreach($varCodigos as $codigo)
                                <option value="{{$codigo->cd_modulo}}">{{$codigo->tx_valor}}</option>
                                @endforeach
                            @endif
                            </select>
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Seleccionar Grupo Cobro</label>
                            <select class="form-control" name="tx_parametro2">
                                 <option value=""></option>
                            @if($varCodigos2)
                                @foreach($varCodigos2 as $codigo)
                                <option value="{{$codigo->cd_modulo}}">{{$codigo->tx_valor}}</option>
                                @endforeach
                            @endif
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>_</label>
                        <button class="btn btn-success form-control" onclick="funcRegistrar()">Solicitar Extracción de Data</button>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="cd_empresa"  class="form-control" value="{{$varUsuario[1]}}"  placeholder="" >
                            <div id="cd_empresa"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="cd_usuario"  class="form-control" value="{{$varEmpresa[1]}}"  placeholder="" >
                            <div id="cd_empresa"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="number" name="cd_usuario"  class="form-control" value="3"  placeholder="" >
                            <div id="cd_programa"></div>
                        </div>
                    </div>
                    
                    </div>
                </div>    
            </div>
        </div>
        </div>
    </div>
    
    <!-- [ badge ] end -->
</div>