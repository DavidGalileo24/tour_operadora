<?php

if($this->session->userdata('logueado')==false){
	redirect('login_controller');	
} 

?>

<?php $this->load->helper('registroReserva'); ?>
<body>
	<div class="contenedor_body">
		
		<br><h1 class="text-center ss">Seguimiento de reserva</h1><br>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover table-bordered">
						<thead class="poke">
							<tr>
								<th>ID</th>
								<th>Empleado</th>
								<th>Reservación</th>
								<th>Fecha registro</th>
								<th>Día reserva</th>
								<th>No. adultos</th>
								<th>No. niños</th>
								<th>A pagar</th>
								<th>Total pagar</th>
								<th>Estado</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody id="tablaRegistro">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<!-- Modal -->
				<div class="modal fade" id="registro" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="" method="POST" id="formRegistro" onclick="return validarRegistro()">
									<input type="hidden" id="id" name="id_reservacion" value="0">
									<p>
										<?php $fecha_sistema = Date('Y-m-d'); ?>
										<label for="fecha_reserva">Fecha reserva:</label>
										<input type="date" id="fecha_reserva" name="fecha_reserva" class="form-control" value="<?php echo $fecha_sistema; ?>" readonly>
									</p>
									<p>
										<label for="nombre_empleado">Empleado:</label>
										<select name="nombre_empleado" id="nombre_empleado" class="form-control">
											<option value="">-Seleccione empleado-</option>
										</select>
									</p>
									<p>
										<label for="nombre_establecimiento">Establecimiento:</label>
										<select name="nombre_establecimiento" id="nombre_establecimiento" class="form-control">
											<option value="">-Seleccione Establecimiento-</option>
										</select>
									</p>
									
									<p>
										<label for="nombre_cliente">Cliente:</label>
										<select name="nombre_cliente" id="nombre_cliente" class="form-control">
											<option value="">-Seleccione cliente-</option>
										</select>
									</p>
									<p>
										<label for="n_adultos">Cantidad de adultos:</label>
										<input type="text" id="n_adultos" name="n_adultos" class="form-control" onkeypress="if(isNaN(String.fromCharCode(event.keyCode))) return false;">
									</p>
									<p>
										<label for="n_ninos">Cantidad de niños:</label>
										<input type="text" id="n_ninos" name="n_ninos" class="form-control" onkeypress="if(isNaN(String.fromCharCode(event.keyCode))) return false;">
									</p>
									<p>
										<label for="total_pagar">Total a pagar:</label>
										<input type="text" id="total_pagar" name="total_pagar" class="form-control" onkeypress="if(isNaN(String.fromCharCode(event.keyCode))) return false;" min="1" max="5" step="0.01" readonly>
									</p>
									<p>
										<label for="abono">Abono:</label>
										<input type="number" id="abono" name="abono" class="form-control" onkeypress="if(isNaN(String.fromCharCode(event.keyCode))) return false;">
									</p>
									<p>
										<label for="residuo">Residuo:</label>
										<input type="number" id="residuo" name="residuo" class="form-control" onkeypress="if(isNaN(String.fromCharCode(event.keyCode))) return false;" readonly>
									</p>
									<p>
										<label for="nombre_estado">Estado:</label>
										<select name="nombre_estado" id="nombre_estado" class="form-control">
											<option value="">-Seleccione cliente-</option>
										</select>
									</p>
									<br>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" id="btnGuardar" class="btn btn-outline-success"><i class="fas fa-check"></i> Guardar</button>
								<button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>