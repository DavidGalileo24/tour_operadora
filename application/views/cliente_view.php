<?php

	if($this->session->userdata('logueado')==false){
	redirect('login_controller');	
} 
?>
<?php $this->load->helper('clientehelper'); ?>
<script src="<?php echo base_url('resources/validaciones/cliente_validacion.js')?>"></script>
<body>
	<div class="contenedor_body">
		<br><h1 class="ss text-center">Clientes</h1><br>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<button type="button" id="nueCli" title="Añade un nuevo cliente" class="btn btn-outline-primary"><i class="fas fa-feather-alt"></i> Nuevo cliente</button>

				</div>
			</div>
		</div><br>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered text-center">
						<thead class="poke">
							<tr>
								<th>N°</th>
								<th>Nombre completo</th>
								<th>Número de DUI</th>
								<th>Fecha de nacimiento</th>
								<th>Dirección</th>
								<th>Correo</th>
								<th>Teléfono</th>
								<th colspan="2">Acciones</th>
							</tr>


						</thead>
						<tbody id="tabla_clientes">

						</tbody>
					</table>
				</div>
			</div>
		</div><br>


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
		<div class="modal fade" id="cliente" data-backdrop="static">
			<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title"></h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<form id="formCliente" action="" method="POST" onclick="return validarCliente();">
							<input type="hidden" name="id_cliente" id="id" value="0">
							<p>
								<label for="nombre_cliente">Nombre:</label> 
								<input type="text" name="nombre_cliente" id="nombre_cliente"  class="form-control" maxlength="45">
								<div id="infoNombre"></div>
							</p>
							<p>
								<label for="apellido_cliente">Apellido:</label>
								<input type="text" class="form-control"  name="apellido_cliente" id="apellido_cliente"  maxlength="45">
							</p>
							<p>
								<label for="DUI">DUI:</label>
								<input type="text" class="form-control" name="DUI" id="DUI" maxlength="10" minlength="10">
								<script type="text/javascript">
									$(document).ready(function(){
										var glasgow = $("#DUI");
										var celtic = new Inputmask("99999999-9");
										celtic.mask(glasgow);
									});
								</script>
							</p>
							<p>
								<label>Fecha de nacimiento:</label>
								<input type="date" class="form-control"  name="fecha_nac" id="fecha_nac" max="<?php echo Date('Y-m-d');?>">
							</p>
							<p>
								<label for="correo">Correo:</label>
								<input type="text" class="form-control" name="correo" id="correo" maxlength="50">
							</p>
							<p>
								<label for="direccion">Dirección:</label>
								<textarea class="form-control" name="direccion" id="direccion" cols="15" rows="5"></textarea>
							</p>
							<p>
								<label for="telefono">Teléfono:</label>
								<input type="text" class="form-control"  name="telefono" id="telefono" maxlength="9" minlength="9">
								<script type="text/javascript">
									$(document).ready(function(){
										var glasgow = $("#telefono");
										var celtic = new Inputmask("9999-9999");
										celtic.mask(glasgow);
									});
								</script>
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
