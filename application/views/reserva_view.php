<?php

	if($this->session->userdata('logueado')==false){
	redirect('login_controller');	
} 

?>

<?php $this->load->helper('reservahelper') ?>
<body>
	
	<div class="contenedor_body">
		<br><h1 class="ss text-center">Reservas</h1>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-outline-primary" id="btnNuevo">
						<i class="fas fa-feather-alt"></i> Nueva reservación
					</button>
				</div>
			</div>
		</div><br>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9">

					<table class="table  table-bordered table-hover text-center">
						<thead class="poke">
							<tr>
								<th>ID</th>
								<th>Fecha reserva</th>
								<th>Empleado</th>
								<th>Destino</th>
								<th>Fecha salida</th>
								<th>Cliente</th>
								<th>N° adultos</th>
								<th>N° niños</th>
								<th>Total a pagar</th>
								<th>Abono</th>
								<th>Residuo</th>
								<th>Estado</th>
								<th>Seguimiento</th>
								<th colspan="2">Acciones</th>
							</tr>
						</thead>
						<tbody id="datos_reserva">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<!-- Modal -->
					<div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Yorozuya tours dice:</h5>
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

		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<!-- Modal -->
					<div class="modal fade" id="reserva" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="" method="POST" id="formReserva" onclick="return validarReserva()">
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
											<label for="nombre_destino">Destino:</label>
											<select name="nombre_destino" id="nombre_destino" class="form-control">
												<option value="">-Seleccione destino-</option>
											</select>
										</p>
										<!--<p>
											<label for="fecha_salida">Fecha de salida:</label>
											<input type="date" id="fecha_salida" name="fecha_salida" class="form-control">
										</p>-->
										<p>
											<label for="nombre_cliente">Cliente:</label>
											<select name="nombre_cliente" id="nombre_cliente" class="form-control">
												<option value="">-Seleccione cliente-</option>
											</select>
										</p>
										<p>
											<label for="n_adultos">Cantidad de adultos:</label>
											<input type="text" id="n_adultos" name="n_adultos" class="form-control" onkeypress="if(isNaN(String.fromCharCode(event.keyCode))) return false;" maxlength="2" max="20">
										</p>
										<p>
											<label for="n_ninos">Cantidad de niños:</label>
											<input type="text" id="n_ninos" name="n_ninos" class="form-control" onkeypress="if(isNaN(String.fromCharCode(event.keyCode))) return false;" maxlength="2" max="20">
										</p>
										<p>
											<label for="total_pagar">Total a pagar:</label>
											<input type="text" id="total_pagar" name="total_pagar" class="form-control" onkeypress="if(isNaN(String.fromCharCode(event.keyCode))) return false;" min="1" max="5" step="0.01" readonly>
										</p>
										<p>
											<label for="abono">Abono:</label>
											<input type="text" id="abono" name="abono" class="form-control" onkeypress="if(isNaN(String.fromCharCode(event.keyCode))) return false;">
										</p>
										<p>
											<label for="residuo">Residuo:</label>
											<input type="text" id="residuo" name="residuo" class="form-control" onkeypress="if(isNaN(String.fromCharCode(event.keyCode))) return false;" readonly maxlength="5">
										</p>
										<p>
											<label for="nombre_estado">Estado:</label>
											<select name="nombre_estado" id="nombre_estado" class="form-control">
												<option value="">-Seleccione cliente-</option>
											</select>
										</p>
										<br>
									
								</div>
								</form>
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
		

	</div>