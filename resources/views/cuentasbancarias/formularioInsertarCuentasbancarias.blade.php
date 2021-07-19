<div class="row">
<!-- [ badge ] start -->
	<div class="col-sm-12">
		<div id="cr-contenido-cuentasbancarias" style="display: none;">
		<div class="card">
			<div class="card-header">
				<h5>Formulario para Asignar Cuentas Bancarias a: {{$varEmpresas[0]->tx_empresa}}</h5>
			</div>
			<div class="card-body">
				<div class="">
					<i class="feather icon-arrow-left" style="font-size:16px;"></i> <a href="#" onclick="funcEsconderFormularioCuentasbancarias()">Regresar a Cuentas Bancarias</a>
					<hr>
					<form method="POST" action="/cuentasbancarias.registrar" name="cr-cuentasbancarias">
						@csrf
						
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Banco de la Cuenta</label>
									<select class="form-control" name="cd_banco" id="accd_menu" onchange="funcBuscarVerificadoPorBanco()">
									
									@if($bancos)
										@foreach($bancos as $banco)
										<option value="{{$banco->cd_banco}}">{{$banco->tx_banco}}</option>
										@endforeach
									@endif
									</select>
								</div>
								<div id="cd_banco"></div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Cuenta Bancaria</label>
									<div class="row">
										<div class="col-md-3">
											<input type="text" name="cd_verificador" maxlength="4"  class="form-control"  placeholder="">
										</div>
										<div class="col-md-9">
										<input type="text" name="tx_cuenta" maxlength="20"  class="form-control"  placeholder="">
										</div>
									</div>
									<div id="tx_cuenta"></div>

								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Consecutivo de Envío</label>
									<input type="number" name="nu_lote"  class="form-control"  placeholder="" >
									<div id="nu_lote"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Ruta de Almacenamiento</label>
									<input type="text" name="tx_ruta"  class="form-control"  aria-describedby="emailHelp" placeholder="">
									<div id="tx_ruta"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Nombre de Salida</label>
									<input type="text" name="tx_nombre_archivo_salida"  class="form-control"  aria-describedby="emailHelp" placeholder="">
									<div id="tx_nombre_archivo_salida"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">¿Genera Afiliación?</label>
									<select class="form-control" name="tx_afiliacion" >
									<option value="0">Si</option>
									<option value="1">No</option>
									</select>
								</div>
								<div id="tx_afiliacion"></div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">¿Genera Carta al Banco?</label>
									<select class="form-control" name="tx_carta" >
									<option value="0">Si</option>
									<option value="1">No</option>
									</select>
								</div>
								<div id="tx_carta"></div>
							</div>
							
						</div>
					</form>
					<div class="col-md-2 offset-md-10">
						<button class="btn btn-info" onclick="funcInsertarFormulario('cr-cuentasbancarias','/cuentasbancarias.registrar')">Guardar Registro</button>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

<!-- [ badge ] end -->
</div>