<div class="row">
<!-- [ badge ] start -->
	<div class="col-sm-12">
		<div id="ac-contenido-roles" style="display: none;">
		<div class="card">
			<div class="card-header">
				<h5>Formulario para Actualizar Menús del Sistema</h5>
			</div>
			<div class="card-body">
				<div class="">
					<i class="feather icon-arrow-left" style="font-size:16px;"></i> <a href="#" onclick="funcEsconderFormularioActualizarRoles()">Regresar a menus</a>
					<hr>
					<form method="POST" action="/roles.registrar" name="ac-roles">
						@csrf
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Nombre del Rol</label>
									<input type="text" name="tx_rol"  class="form-control" id="actx_rol" aria-describedby="emailHelp" placeholder="">
									<div id="tx_rol"></div>
								</div>
							</div>
							
                            <input type="text" name="cd_rol" id="accd_rol" value="" hidden>
							
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