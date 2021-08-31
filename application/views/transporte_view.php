<?php

	if($this->session->userdata('logueado')==false){
	redirect('login_controller');	
} 

?>

<?php $this->load->helper('transportehelper'); ?>
<body>

	<div class="contenedor_body">
		<br><h1 class="ss text-center">Datos transporte</h1></br>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<button type="button" class="btn btn-outline-primary" id="transporteD" >
						<i class="fas fa-feather-alt"></i> Nuevo transporte
					</button>
				</div>
			</div>
		</div>
		<br>

		<div class="container-fluid">	
			<div class="row">
				<div class="col-md-12">
					<table  class="table table-bordered text-center">
						<thead class="poke">
							<tr>
								<th>N°</th>
								<th>Nombre motorista</th>
								<th>Licencia</th>
								<th>Placa</th>
								<th>Modelo</th>
								<th>Marca</th>
								<th>Capacidad</th>
								<th>Estado de la unidad</th>

								<th colspan="2">Acciones</th>
							</tr>

						</thead>
						<tbody id="tabla_transporte">


						</tbody>
					</table>
				</div>

			</div>
		</div>


		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<!-- Modal -->
					<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
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
		<div class="modal fade" id="transporte" data-backdrop="static">
			<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title"></h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<form id="formTransporte" action="" method="POST" onclick="return validarTrans()">
							<input type="hidden" name="id_transporte" id="id" value="0">
							<p>
								<label for="placa">Placa:</label>
								<input type="text" class="form-control"  name="placa" id="placa">
								<script type="text/javascript">
									$(document).ready(function(){
										var glasgow = $("#placa");
										var celtic = new Inputmask("P999-999");
										celtic.mask(glasgow);
									});
								</script>
							</p>
							<p>
								<label for="modelo">Modelo</label>
								<input type="text" class="form-control" name="modelo" id="modelo" >
							</p>
							<p>
								<label for="modelo">Marca</label>
								<input type="text" class="form-control" name="marca" id="marca" >
							</p>
							<p>
								<label for="capacidad">Capacidad</label>
								<input type="text" class="form-control" name="capacidad" id="capacidad" maxlength="2" onkeypress="if(isNaN(String.fromCharCode(event.keyCode))) return false;">

								<script>
									var capacidad = document.getElementById('capacidad').value;
									if(capacidad > 20){
										document.getElementById('capacidad').placeholder = "Solo se aceptan 20 pasajeros";
										return false;
									}
									
								</script>
								
							</p>
							<p>
								<label for="nombre_empleado">Nombre del motorista</label> 
								<select name="nombre_empleado" id="nombre_empleado" class="form-control">
									<option value="">--seleccione empleado----</option>

								</select>
							</p>
							<p>
								<label for="nombre_estadoT">Estado de la unidad</label>
								<select  name="nombre_estadoT" id="nombre_estadoT"   class= "form-control">
									<option value="">estado</option>

								</select>
							</p>

						</form>
					</div>
					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" id="btnGuardar" class="btn btn-outline-success"><i class="fas fa-check"></i> Guardar</button>
						<button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
					</div>

				</div>
			</div>

		</div>


	</div>






