<div class="row">
<!-- [ badge ] start -->
	<div class="col-sm-12">
		<div id="ac-contenido-bancos" style="display: none;">
		<div class="card">
			<div class="card-header">
				<h5>Formulario para Actualizar Menús del Sistema</h5>
			</div>
			<div class="card-body">
				<div class="">
					<i class="feather icon-arrow-left" style="font-size:16px;"></i> <a href="#" onclick="funcEsconderFormularioActualizarBancos()">Regresar a menus</a>
					<hr>
					<form method="POST" action="/bancos.registrar" name="ac-bancos">
						@csrf
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Código del Banco</label>
									<input type="text" name="cd_banco"  class="form-control" id="accd_banco" aria-describedby="emailHelp" placeholder="">
									<div id="cd_banco"></div>
								</div>
							</div>
							
                            

							<div class="col-md-4">
								<div class="form-group">
									<label for="">Nombre del Banco</label>
									<input type="text" name="tx_banco"  class="form-control" id="actx_banco" aria-describedby="emailHelp" placeholder="">
									<div id="tx_banco"></div>
								</div>
							</div>
							
                            
                            
                            <div class="col-md-4">
								<div class="form-group">
									<label for="">Codigo Verificador del Banco</label>
									<input type="text" name="cd_verificador"  class="form-control" id="accd_verificador" aria-describedby="emailHelp" placeholder="">
									<div id="cd_verificador"></div>
								</div>
							</div>
							
							
						</div>
					</form>
					<div class="col-md-2 offset-md-10">
						<button class="btn btn-info" onclick="funcInsertarFormulario('ac-bancos','/bancos.actualizar')">Guardar Registro</button>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

<!-- [ badge ] end -->
</div>