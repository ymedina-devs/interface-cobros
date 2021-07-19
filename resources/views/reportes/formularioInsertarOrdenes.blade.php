<div class="row">
<!-- [ badge ] start -->
	<div class="col-sm-12">
		<div id="cr-contenido-tablacodigo" style="display: none;">
		<div class="card">
			<div class="card-header">
				<h5>Formulario para Roles del Sistema</h5>
			</div>
			<div class="card-body">
				<div class="">
					<i class="feather icon-arrow-left" style="font-size:16px;"></i> <a href="#" onclick="funcEsconderFormularioTablacodigo()">Regresar a menus</a>
					<hr>
					<form method="POST" action="/tablacodigo.registrar" name="cr-tablacodigo">
						@csrf
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Nombre de la Tabla</label>
									<input type="text" name="cd_tabla"  class="form-control"  placeholder="">
									<div id="cd_tabla"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Código del Módulo</label>
									<input type="number" name="cd_modulo"  class="form-control"  placeholder="">
									<div id="cd_modulo"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Descripción del Módulo</label>
									<input type="text" name="tx_valor"  class="form-control"  aria-describedby="emailHelp" placeholder="">
									<div id="tx_valor"></div>
								</div>
							</div>
							
						</div>
					</form>
					<div class="col-md-2 offset-md-10">
						<button class="btn btn-info" onclick="funcInsertarFormulario('cr-tablacodigo','/tablacodigo.registrar')">Guardar Registro</button>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

<!-- [ badge ] end -->
</div>