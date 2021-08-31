<?php

if($this->session->userdata('logueado')==false){
	redirect('login_controller');	
}

?>
<?php $this->load->helper('usuariohelper') ?>
<body>
	<div class="contenedor_body">
		<br><h1 class="text-center ss">Usuarios</h1><br>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<button class="btn btn-outline-primary" id="new_user"><i class="fas fa-feather-alt"></i> Nuevo usuario</button>
					<br>
					<br>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered table-hover text-center">
						<thead class="poke">
							<tr>
								<th>N°</th>
								<th>Empleado</th>
								<th>Cargo</th>
								<th>Correo</th>
								<th>Usuario</th>
								<th>Rol</th>
								<th>eliminar</th>
							</tr>
						</thead>
						<tbody id="s">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">

					<!-- Modal -->
					<div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title"><i class="fas fa-user-times"></i> Yorozuya tours dice:</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<img src="<?php echo base_url('resources/images/icons/eliminar.png')?>" alt="" class="animated infinite tada delay-1s alertas img-fluid" width="25%" height="25%"><br>
									<h3 class="text-center">¿Desea eliminar el registro?</h3>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-outline-danger centrado" id="btnBorrar" data-dismiss="modal">Eliminar</button>
									<button type="button" class="btn btn-outline-info centrado" data-dismiss="modal">Cancelar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">

					<!-- Modal -->
					<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" data-backdrop="static">
						<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Ingrese un nuevo Usuario: </h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="" method="POST" id="formu">
										<input type="hidden" id="id" name="ID" value="0">
										<p>
											<label for="" id="emp">Seleccione un empleado:</label>
											<select name="cmb_empleado" id="cmb_empleado" class="form-control">
												<option value="">------seleccione un empleado-------</option>
											</select>
										</p>
										<br>
										<p>
											
											<label for="">Escriba el nombre de usuario para el empleado:</label>
											<input type="text" name="usuario" id="usuario" class="form-control">
										</p>
										<br>
										<p>
											<label for="">Escriba una contraseña:</label>
											<input type="password" name="clave" id="clave" class="form-control">
										</p>
										<br>
										<p>
											<label for="">Seleccione un rol para el empleado:</label>
											<select name="cmb_rol" id="cmb_rol" class="form-control">
												<option value="">Seleccione un rol para el empleado</option>
											</select>
										</p>

									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-outline-info" id="btnGuardar" data-dismiss="modal">Guardar</button>
									<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>