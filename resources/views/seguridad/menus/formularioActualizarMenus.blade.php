<div class="row">
<!-- [ badge ] start -->
	<div class="col-sm-12">
		<div id="ac-contenido" style="display: none;">
		<div class="card">
			<div class="card-header">
				<h5>Formulario para Actualizar Menús del Sistema</h5>
			</div>
			<div class="card-body">
				<div class="">
					<i class="feather icon-arrow-left" style="font-size:16px;"></i> <a href="#" onclick="funcEsconderFormularioActualizar()">Regresar a menus</a>
					<hr>
					<form method="POST" action="/menus.registrar" name="ac-menus">
						@csrf
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Nombre del Menú</label>
									<input type="text" name="tx_menu"  class="form-control" id="actx_menu" aria-describedby="emailHelp" placeholder="">
									<div id="tx_menu"></div>
								</div>
							</div>
							<div class="col-md-5">
								<label for="basic-url">Enlace del Menú</label>
								<div class="input-group mb-3">

									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon3">http://192.168.0.48/</span>
									</div>
									<input type="text" name="tx_enlace" id="actx_enlace" class="form-control"  aria-describedby="basic-addon3">
									
								</div>
								<div id="tx_enlace"></div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Icono del menú</label>
									<select class="form-control" name="tx_icono" id="actx_icono" >
										<option value="null">No posee</option>
										<option value="feather icon-airplay">icon-airplay</option>
										<option value="feather icon-bar-chart-2">icon-bar-chart-2</option>
										<option value="feather icon-briefcases">icon-briefcases</option>
										<option value="feather icon-compass">icon-compass</option>
										<option value="feather icon-layers">icon-layers</option>
										<option value="feather icon-list">icon-list</option>
										<option value="feather icon-globe">icon-globe</option>
										<option value="feather icon-inbox">icon-inbox</option>
										<option value="feather icon-server">icon-server</option>
										<option value="feather icon-folder">icon-folder</option>
										<option value="feather icon-file-text">icon-file-text</option>
										<option value="feather icon-users">icon-users</option>
									</select>
								</div>
								<div id="tx_icono"></div>
							</div>
						
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Tipo de menú</label>
									<select class="form-control" name="tp_menu" id="actp_menu">
									
									@if($varTpMenu)
										@foreach($varTpMenu as $menu)
										<option value="{{$menu->cd_modulo}}">{{$menu->tx_valor}}</option>
										@endforeach
									@endif
									</select>
								</div>
								<div id="tp_menu"></div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Menú Padre</label>
									<select class="form-control" name="cd_padre" id="accd_padre">
									<option value="0">No posee</option>
										@if($varMenus)
											@foreach($varMenus as $menu)
											<option value="{{$menu->cd_menu}}">{{$menu->tx_menu}}</option>
											@endforeach
										@endif
									</select>
								</div>
								<div class="cd_padre"></div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputEmail1">Consecutivo del menu</label>
									<input type="number" name="nu_consecutivo" class="form-control" id="acnu_consecutivo" aria-describedby="emailHelp" placeholder="">
									<div id="nu_consecutivo"></div>
								</div>
								
							</div>
                            <input type="text" name="cd_menu" id="accd_menu" value="" hidden>
							
						</div>
					</form>
					<div class="col-md-2 offset-md-10">
						<button class="btn btn-info" onclick="funcInsertarFormulario('ac-menus','/menus.actualizar')">Guardar Registro</button>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

<!-- [ badge ] end -->
</div>