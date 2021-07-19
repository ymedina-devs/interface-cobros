<div class="row">
<!-- [ badge ] start -->
	<div class="col-sm-12">
		<div id="ac-contenido-cuentasbancarias" style="display: none;">
		<div class="card">
			<div class="card-header">
				<h5>Formulario para Actualizar Menús del Sistema</h5>
			</div>
			<div class="card-body">
				<div class="">
					<i class="feather icon-arrow-left" style="font-size:16px;"></i> <a href="#" onclick="funcEsconderFormularioActualizarCuentasbancarias()">Regresar a menus</a>
					<hr>
					<form method="POST" action="/cuentasbancarias.registrar" name="ac-cuentasbancarias">
						@csrf
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Banco de la Cuenta</label>
									<select  id="accd_banco" class="form-control" name="cd_banco" id="accd_menu" onchange="funcBuscarVerificadoPorBanco()">
									
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
										<div class="col-md-12">
										<input id="actx_cuenta" type="text" name="tx_cuenta" maxlength="20"  class="form-control"  placeholder="">
										</div>
									</div>
									<div id="tx_cuenta"></div>

								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Consecutivo de Envío</label>
									<input id="acnu_lote" type="number" name="nu_lote"  class="form-control"  placeholder="" >
									<div id="nu_lote"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Ruta de Almacenamiento</label>
									<input id="actx_ruta" type="text" name="tx_ruta"  class="form-control"  aria-describedby="emailHelp" placeholder="">
									<div id="tx_ruta"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Nombre de Salida</label>
									<input id="actx_nombre_archivo_salida" type="text" name="tx_nombre_archivo_salida"  class="form-control"  aria-describedby="emailHelp" placeholder="">
									<div id="tx_nombre_archivo_salida"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">¿Genera Afiliación?</label>
									<select  id="actx_afiliacion" class="form-control" name="tx_afiliacion" >
									<option value="0">Si</option>
									<option value="1">No</option>
									</select>
								</div>
								<div id="tx_afiliacion"></div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">¿Genera Carta al Banco?</label>
									<select  id="actx_carta" class="form-control" name="tx_carta" >
									<option value="0">Si</option>
									<option value="1">No</option>
									</select>
								</div>
								<div id="tx_carta"></div>
							</div>
							
						</div>
						<input id="accd_cuentabancaria" type="text" name="cd_cuentabancaria"  class="form-control"  aria-describedby="emailHelp" hidden>
						<input id="accd_empresa" type="text" name="cd_empresa"  class="form-control"  aria-describedby="emailHelp" hidden>


					</form>
					<div class="col-md-2 offset-md-10">
						<button class="btn btn-info" onclick="funcInsertarFormulario('ac-cuentasbancarias','/cuentasbancarias.actualizar')">Guardar Registro</button>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

<!-- [ badge ] end -->
</div>