<?php

if($this->session->userdata('logueado')==false){
	redirect('login_controller');	
} 

?>
<?php $this->load->helper('destinohelper') ?>
<body>
	<div class="contenedor_body">
		<br>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<h1 class="ss text-center">Destinos</h1></div>
					<div class="col-md-4"></div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<button type="button" class="btn btn-outline-primary" id="new_registro"><i class="fas fa-feather-alt"></i>Nuevo destino</button>
					</div>
				</div>
			</div>
			<br>
			<div class="container-fluid">


				<div class="row">
					<div class="col-md-12">
						<table class="table  table-bordered table-hover table-sm table-responsive text-center">
							<thead class="poke">
								<tr>
									<th>N°</th>
									<th>Nombre del destino</th>
									<th>Categoria</th>
									<th>Descripción del destino</th>
									
									<th>Departamento</th>
									<th>Dirección del destino</th>
									<th>Eliminar</th>
									<th>Actualizar</th>
								</tr>
							</thead>
							<tbody id="tabla_destino"></tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="container-fluid">
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

			</div>
			<div class="container">
				<div class="modal fade" id="destino"  data-backdrop="static">
					<div class="modal-dialog  modal-dialog-scrollable">
						<div class="modal-content">

							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title"></h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<!-- Modal body -->
							<div class="modal-body">
								<form action="" method="POST" id="form_destino" enctype="multipart/form-data">
									<input type="hidden" name="id_destino" id="id" value="0">
									<p>
										<label for="">Ingrese el nombre del destino</label>:
										<input type="text" class="form-control" name="nombre_destino" id="nombre_destino"></p>
										<br>
										
										<p>
											<label for="">Seleccione la categoria de destino:</label>

											<select name="categoria" id="categoria" class="form-control">
												<option value="">------Seleccione una opción----</option>
											</select>
										</p>
										<br>
										<p>
											<label for="">Ingrese la descripción del lugar de destino:</label>
											<textarea name="descripcion" id="descripcion" class="form-control"  cols="30" rows="10"></textarea>
										</p>
										<br>
										<p>
											<label for="">Seleccione en que departamento del pais se encuentra el destino:</label>
											<select name="departamento" id="departamento" class="form-control">
												<option value="">---------Seleccione una opción--------</option>
											</select>

										</p>
										<br>
										<p>
											<label for="">Introduzca la dirección del destino:</label>
											<textarea name="direccion" id="direccion" class="form-control" ></textarea>
										</p>
									</form>						

								</div>

								<!-- Modal footer -->
								<div class="modal-footer">
									<button type="button" id="btn_guardar" class="btn btn-outline-primary">Guardar</button>
									<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
