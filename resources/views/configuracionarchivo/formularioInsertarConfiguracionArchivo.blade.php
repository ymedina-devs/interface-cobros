<div class="row">
<!-- [ badge ] start -->
	<div class="col-sm-12">
		<div id="cr-contenido-configuracionarchivo" style="display: none;">
		<div class="card">
			<div class="card-header">
				<h5>Formulario para Configuracion de Archivos del Sistema</h5>
			</div>
			<div class="card-body">
				<div class="">
					<i class="feather icon-arrow-left" style="font-size:16px;"></i> <a href="#" onclick="funcEsconderFormularioConfiguracionarchivo()">Regresar a Configuración de Archivos</a>
					<hr>
					<form method="POST" action="/configuracionarchivo.registrar" name="cr-configuracionarchivo">
						@csrf
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for=""> Tipo del Archivo</label>
									<select class="form-control" name="tx_tipo" >
										@if($varTablacodigo1)
										@foreach($varTablacodigo1 as $tabla)
										<option value="{{$tabla->cd_modulo}}">{{$tabla->tx_valor}}</option>
										@endforeach
									@endif
									</select>
									<input type="text" name="tx_tipo"  class="form-control"  placeholder="" hidden>
								</div>
								<div id="tx_tipo"></div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Caracteres por Cabecera</label>
									<input type="number" name="nu_lineas_cab"  class="form-control"  placeholder="">
									<div id="nu_lineas_cab"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Caracteres por Detalle</label>
									<input type="number" name="nu_lineas_det"  class="form-control"  placeholder="">
									<div id="nu_lineas_det"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Caracteres por Píe</label>
									<input type="number" name="nu_lineas_pie"  class="form-control"  placeholder="">
									<div id="nu_lineas_pie"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Separador de Texto</label>
									<input type="text" name="tx_separador"  class="form-control"  aria-describedby="emailHelp" placeholder="">
									<div id="tx_separador"></div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label for="">Nombre de Salida</label>
									<input type="text" name="tx_nombre_salida"  class="form-control"  aria-describedby="emailHelp" placeholder="">
									<div id="tx_nombre_salida"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for=""> Tipo del Archivo</label>
									<select class="form-control" name="tx_formato" >
										@if($varTablacodigo)
										@foreach($varTablacodigo as $tabla)
										<option value="{{$tabla->cd_modulo}}">{{$tabla->tx_valor}}</option>
										@endforeach
									@endif
									</select>
								</div>
								<div id="tx_formato"></div>
							</div>
						</div>
						
					</form>
					<div class="col-md-2 offset-md-10">
						<button class="btn btn-info" onclick="funcInsertarFormulario('cr-configuracionarchivo','/configuracionarchivo.registrar')">Guardar Registro</button>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

<!-- [ badge ] end -->
</div>