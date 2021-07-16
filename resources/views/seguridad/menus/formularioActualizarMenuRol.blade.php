<div class="row">
<!-- [ badge ] start -->
	<div class="col-sm-12">
		<div id="ac-contenido-menurol" style="display: none;">
		<div class="card">
			<div class="card-header">
				<h5>Formulario para Actualizar Menu Rol del Sistema</h5>
			</div>
			<div class="card-body">
				<div class="">
					<i class="feather icon-arrow-left" style="font-size:16px;"></i> <a href="#" onclick="funcEsconderFormularioActualizarMenuRol()">Regresar a menus</a>
					<hr>
					<form method="POST" action="/menurol.registrar" name="ac-menurol">
						@csrf
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for=""> Nombre del Menú</label>
									<select class="form-control" name="cd_menu" id="accd_menu_mr">
									
									@if($menus)
										@foreach($menus as $menu)
										<option value="{{$menu->cd_menu}}">{{$menu->tx_menu}}</option>
										@endforeach
									@endif
									</select>
								</div>
								<div id="cd_menu"></div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for=""> Nombre del Rol</label>
									<select class="form-control" name="cd_rol" id="accd_rol_mr">
									@if($menus)
										@foreach($roles as $rol)
										<option value="{{$rol->cd_rol}}">{{$rol->tx_rol}}</option>
										@endforeach
									@endif
									</select>
								</div>
								<div id="cd_rol"></div>
							</div>
							
                            <input type="text" name="id" id="acid_mr" value="" hidden>
							
						</div>
					</form>
					<div class="col-md-2 offset-md-10">
						<button class="btn btn-info" onclick="funcInsertarFormulario('ac-menurol','/menurol.actualizar')">Guardar Registro</button>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

<!-- [ badge ] end -->
</div>