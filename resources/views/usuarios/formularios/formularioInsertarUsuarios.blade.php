<div class="row">
<!-- [ badge ] start -->
	<div class="col-sm-12">
		<div id="cr-contenido" style="display: none;">
		<div class="card">
			<div class="card-header">
				<h5>Formulario para Registar Menús del Sistema</h5>
			</div>
			<div class="card-body">
				<div class="">
					<i class="feather icon-arrow-left" style="font-size:16px;"></i> <a href="#" onclick="funcEsconderFormulario()">Regresar a menus</a>
					<hr>
					<form method="POST" action="/menus.registrar" name="cr-usuarios">
						@csrf
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Usuario de acceso</label>
									<input type="text" name="cd_usuario"  class="form-control" id="" aria-describedby="emailHelp" placeholder="">
									<div id="cd_usuario"></div>
								</div>
							</div>
                            <div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputEmail1">Clave de Acceso</label>
									<input type="password" name="tx_clave" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
									<div id="tx_clave"></div>
								</div>
								
							</div>
                            <div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputEmail1">Nombre del Analista</label>
									<input type="text" name="tx_nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
									<div id="tx_nombre"></div>
								</div>
								
							</div>
                            <div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputEmail1">Acceso Externo</label>
									<input type="text" name="cd_usuario_ext" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
									<div id="cd_usuario_ext"></div>
								</div>
								
							</div>
						
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Empresa de Operaciones</label>
									<select class="form-control" name="cd_empresa">
									
									@if($varEmpresas)
										@foreach($varEmpresas as $empresa)
										<option value="{{$empresa->cd_empresa}}">{{$empresa->tx_empresa}}</option>
										@endforeach
									@endif
									</select>
								</div>
								<div id="cd_empresa"></div>
							</div>

							
						</div>
					</form>
					<div class="col-md-2 offset-md-10">
						<button class="btn btn-info" onclick="funcInsertarFormulario('cr-usuarios','/usuarios.registrar')">Guardar Registro</button>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

<!-- [ badge ] end -->
</div>