<div class="row">
<!-- [ badge ] start -->
	<div class="col-sm-12">
		<div id="cr-contenido-roles" style="display: none;">
		<div class="card">
			<div class="card-header">
				<h5>Formulario para Roles del Sistema</h5>
			</div>
			<div class="card-body">
				<div class="">
					<i class="feather icon-arrow-left" style="font-size:16px;"></i> <a href="#" onclick="funcEsconderFormulario()">Regresar a menus</a>
					<hr>
					<form method="POST" action="/roles.registrar" name="cr-roles">
						@csrf
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Codigo del Rol</label>
									<input type="text" name="cd_rol"  class="form-control" id="" aria-describedby="emailHelp" placeholder="">
									<div id="cd_rol"></div>
								</div>
							</div>
                            <div class="col-md-3">
								<div class="form-group">
									<label for="">Descripcion del Rol</label>
									<input type="text" name="tx_rol"  class="form-control" id="" aria-describedby="emailHelp" placeholder="">
									<div id="tx_rol"></div>
								</div>
							</div>
							
						</div>
					</form>
					<div class="col-md-2 offset-md-10">
						<button class="btn btn-info" onclick="funcInsertarFormulario('cr-roles','/roles.registrar')">Guardar Registro</button>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

<!-- [ badge ] end -->
</div>