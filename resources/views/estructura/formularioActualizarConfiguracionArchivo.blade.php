<div class="row">
<!-- [ badge ] start -->
	<div class="col-sm-12">
		<div id="ac-contenido-configuracionarchivo" style="display: none;">
		<div class="card">
			<div class="card-header">
				<h5>Formulario para Actualizar Menús del Sistema</h5>
			</div>
			<div class="card-body">
				<div class="">
					<i class="feather icon-arrow-left" style="font-size:16px;"></i> <a href="#" onclick="funcEsconderFormularioActualizarconfiguracionarchivo()">Regresar a menus</a>
					<hr>
					<form method="POST" action="/configuracionarchivo.registrar" name="ac-configuracionarchivo">
						@csrf
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for=""> Tipo del Archivo</label>
									<select  class="form-control" name="actx_tipo_temp" onchange="funcTransferirValorInputTxFormato()">
										<option value=".txt-Archivo de Texto">Archivo de Texto</option>
										<option value=".csv-Archivo de Separados Por Comas">Archivo de Separados Por Comas</option>
										<option value=".xls-Archivo de Excel 2003">Archivo de Excel 2003</option>
										<option value=".xlsx-Archivo de Excel >= 2007">Archivo de Excel >= 2007</option>
									</select>
									<input id="actx_tipo" type="text" name="tx_tipo"  class="form-control"  placeholder="" hidden >
								</div>
								<div id="tx_tipo"></div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Caracteres por Cabecera</label>
									<input id="acnu_lineas_cab" type="number" name="nu_lineas_cab"  class="form-control"  placeholder="">
									<div id="nu_lineas_cab"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Caracteres por Detalle</label>
									<input id="acnu_lineas_det" type="number" name="nu_lineas_det"  class="form-control"  placeholder="">
									<div id="nu_lineas_det"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Caracteres por Píe</label>
									<input id="acnu_lineas_pie" type="number" name="nu_lineas_pie"  class="form-control"  placeholder="">
									<div id="nu_lineas_pie"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for=""> Banco</label>
									<select id="accd_banco" class="form-control" name="cd_banco">
									
									@if($varBancos)
										@foreach($varBancos as $banco)
										<option value="{{$banco->cd_banco}}">{{$banco->tx_banco}}</option>
										@endforeach
									@endif
									</select>
								</div>
								<div id="cd_banco"></div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Separador de Texto</label>
									<input id="actx_separador" type="text" name="tx_separador"  class="form-control"  aria-describedby="emailHelp" placeholder="">
									<div id="tx_separador"></div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label for="">Nombre de Salida</label>
									<input id="actx_nombre_salida" type="text" name="tx_nombre_salida"  class="form-control"  aria-describedby="emailHelp" placeholder="">
									<div id="tx_nombre_salida"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									
									<input id="actx_formato" type="text" name="tx_formato"  class="form-control"  aria-describedby="emailHelp" placeholder="" hidden>
									<div id="tx_formato"></div>
								</div>
							</div>
						</div>
						<input id="accd_configuracion" type="text" name="cd_configuracion"  class="form-control"  aria-describedby="emailHelp" placeholder="" hidden>
					</form>
					<div class="col-md-2 offset-md-10">
						<button class="btn btn-info" onclick="funcInsertarFormulario('ac-configuracionarchivo','/configuracionarchivo.actualizar')">Guardar Registro</button>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

<!-- [ badge ] end -->
</div>