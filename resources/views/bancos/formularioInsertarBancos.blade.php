<div class="row">
<!-- [ badge ] start -->
	<div class="col-sm-12">
		<div id="cr-contenido-bancos" style="display: none;">
		<div class="card">
			<div class="card-header">
				<h5>Formulario para Roles del Sistema</h5>
			</div>
			<div class="card-body">
				<div class="">
					<i class="feather icon-arrow-left" style="font-size:16px;"></i> <a href="#" onclick="funcEsconderFormularioBancos()">Regresar a menus</a>
					<hr>
					<form method="POST" action="/bancos.registrar" name="cr-bancos">
						@csrf
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Codigo del Banco</label>
									<input type="number" name="cd_banco"  maxlength="4" class="form-control"  placeholder="">
									<div id="cd_banco"></div>
								</div>
							</div>
                            <div class="col-md-4">
								<div class="form-group">
									<label for="">Nombre del Banco</label>
									<input type="text" name="tx_banco"  class="form-control"  aria-describedby="emailHelp" placeholder="">
									<div id="tx_banco"></div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Código Verificador del Banco</label>
									<input type="number" name="cd_verificador" maxlength="4" class="form-control"  aria-describedby="emailHelp" placeholder="">
									<div id="cd_verificador"></div>
								</div>
							</div>
							
						</div>
					</form>
					<div class="col-md-2 offset-md-10">
						<button class="btn btn-info" onclick="funcInsertarFormulario('cr-bancos','/bancos.registrar')">Guardar Registro</button>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

<!-- [ badge ] end -->
</div>