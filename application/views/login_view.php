<body class="malasia"> 
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="<?php echo base_url('login_controller/iniciar') ?>" method="POST" class="form-login" autocomplete="off">

					<p class="text-center"><i class="fas fa-user-circle kaiser"></i></p>
					<p><h3 class="text-center">Inicio de sesión</h3></p>
					<p>
						<label for="">Usuario:</label>
						<input type="text" name="usuario" class="form-control" id="usuario" required="">
					</p>
					<p>
						<label for="">Contraseña:</label>
						<input type="password" name="pass" class="form-control" id="pass" required="">
					</p>
					<br>
					<p>
						<input type="submit" class="btn btn-info" value="Aceptar"><!--a class="text" href="#" data-toggle="modal" data-target="#correo">Olvide mi contraseña</a>-->
					</p>

				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div><br>
	<div class="container">
		<div class="row">
			<div class="col-md-5"></div>
			<div class="col-md-2">
				<a href="<?php echo base_url('Welcome')?>"><button type="button" class="btn btn-success btn-block sub" data-toggle="tooltip" data-placement="top" title="Ir a página principal"><i class="fas fa-hand-point-left"></i> Regresar
				</button></a>
			</div>
			<div class="col-md-5"></div>
		</div>
	</div>
	<div class="container">
	<div class="modal fade" id="correo" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalScrollableTitle">Digite su correo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url('correo_controller') ?>" method="POST">
					<div class="modal-body">
						<label style="color: red">Escriba su correo y se le enviara una nueva clave</label>
						<div class="row">
							<div class="col-md-3">Escriba su correo:</div>
							<div class="col-md-9">
								<input type="text" class="form-control" name="correo" id="correo">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Recuperar cuenta</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
	<?php $this->load->view('alertas/alerta_login.php') ?>

	
	
