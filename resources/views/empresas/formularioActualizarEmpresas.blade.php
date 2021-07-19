<div class="row">
<!-- [ badge ] start -->
	<div class="col-sm-12">
		<div id="ac-contenido-empresas" style="display: none;">
		<div class="card">
			<div class="card-header">
				<h5>Formulario para Actualizar Menús del Sistema</h5>
			</div>
			<div class="card-body">
				<div class="">
					<i class="feather icon-arrow-left" style="font-size:16px;"></i> <a href="#" onclick="funcEsconderFormularioActualizarEmpresas()">Regresar a menus</a>
					<hr>
					<form method="POST" action="/empresas.registrar" name="ac-empresas">
						@csrf
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Nombre de la Empresa</label>
									<input id="actx_empresa" type="text" name="tx_empresa"  class="form-control"  placeholder="">
									<div id="tx_empresa"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for=""> Tipo de Documento Asociado a la Empresa</label>
									<select class="form-control" name="tp_documento" id="actp_documento">
									
									@if($documentos)
										@foreach($documentos as $documento)
										<option value="{{$documento->cd_modulo}}">{{$documento->tx_valor}}</option>
										@endforeach
									@endif
									</select>
								</div>
								<div id="tp_documento"></div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Documento Asociado a la Empresa</label>
									<input id="actx_documento" type="text" name="tx_documento"  class="form-control"  aria-describedby="emailHelp" placeholder="">
									<div id="tx_documento"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Icono Asociado a la Empresa</label>
									<input id="actx_icono" type="text" name="tx_icono"  class="form-control"  aria-describedby="emailHelp" placeholder="">
									<div id="tx_icono"></div>
								</div>
							</div>
							<input id="accd_empresa" type="text" name="cd_empresa"  class="form-control"  aria-describedby="emailHelp" hidden>

						</div>

					</form>
					<div class="col-md-2 offset-md-10">
						<button class="btn btn-info" onclick="funcInsertarFormulario('ac-empresas','/empresas.actualizar')">Guardar Registro</button>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

<!-- [ badge ] end -->
</div>