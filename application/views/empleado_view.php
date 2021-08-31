<?php

	if($this->session->userdata('logueado')==false){
	redirect('login_controller');	
} 

?>

<?php $this->load->helper('empleadohelper') ?>
<body>

	<div class="contenedor_body">
		<div class="container-fluid"><br>
			<div class="row">
				<div class="col-md-12">

					<h1 class="ss text-center">Empleados</h1>

					<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalScrollable" id="nueEmple">
						<i class="fas fa-feather-alt"></i> Nuevo empleado
					</button><br><br>

					<table border="1" class="table table-bordered text-center">
						<thead class="poke">
							<tr>
								<td>ID</td>
								<td>DUI</td>
								<td>Nombre</td>
								<td>Fecha de Nacimiento</td>
								<td>Direccion</td>
								<td>Correo</td>
								<td>Telefono</td>
								<td>Licencia</td>
								<td>Cargo</td>
								<td>Eliminar</td>
								<td>Actualizar</td>
							</tr>
						</thead>
						<tbody id="tabla_empleado">

						</tbody>
					</table>
				</div>
			</div>
		</div>



		<!-- Modal -->
		<div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Yorozuya tours dice:</h5>
						<button type="button" class="close" id="btnBorrar" data-dismiss="modal" aria-label="Close">
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
		


		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">

					<div class="modal fade" id="empleado"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalScrollableTitle">p</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="" method="POST" id="formEmpleado" onclick="return validacionEmpleados()">
										<input type="hidden" name="id_empleado" id="id" value="0">
										<p>
											<label for="DUI">DUI:</label>
											<input type="text" id="DUI" name="DUI" class="form-control" maxlength="10" minlength="10">
											<p id="validaDUI" class="ajax"></p>

											<script type="text/javascript">
												$(document).ready(function(){
													var glasgow = $("#DUI");
													var celtic = new Inputmask("99999999-9");
													celtic.mask(glasgow);
												});
											</script>
										</p>
										<p>
											<label for="nombre_empleado">Nombre:</label>
											<input type="text" id="nombre_empleado" name="nombre_empleado" class="form-control">
										</p>
										<p>
											<label for="apellido_empleado">Apellido:</label>
											<input type="text" id="apellido_empleado" name="apellido_empleado" class="form-control" maxlength="45">
										</p>
										<p>
											<label for="fecha_nac">Fecha Nacimiento:</label>
											<input type="date" id="fecha_nac" name="fecha_nac" class="form-control"  max="<?php echo Date('Y-m-d');?>">
										</p>
										<p>
											<label for="direccion">Direccion:</label>
											<textarea name="direccion" id="direccion" cols="15" rows="5" class="form-control"></textarea>

										</p>
										<p>
											<label for="correo">Correo:</label>
											<input type="text" id="correo" name="correo" class="form-control">
										</p>
										<p>
											<label for="telefono">Telefono:</label>
											<input type="text" id="telefono" name="telefono" class="form-control" maxlength="9">
											<script type="text/javascript">
												$(document).ready(function(){
													var glasgow = $("#telefono");
													var celtic = new Inputmask("9999-9999");
													celtic.mask(glasgow);
												});
											</script>
										</p>
										<p>
											<label for="respuesta">Licencia:</label>
											<select name="respuesta" id="respuesta" class="form-control">
												<option value="">-Seleccione cliente-</option>
											</select>
										</p>
										<p>
											<label for="nombre_cargo">Cargo:</label>
											<select name="nombre_cargo" id="nombre_cargo" class="form-control">
												<option value="">-Seleccione cargo-</option>
											</select>
										</p>
										<br>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" id="btnGuardar" name="btnGuardar" class="btn btn-outline-success"><i class="fas fa-check"></i> Aceptar</button>
									<button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>

		
	</div>

