<?php $this->load->helper('cambiar'); ?>

<div class="nav_user sticky-top">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<a href="<?php echo base_url('inicio_controller')?>"><div class="locate"><h2 class="logologo"><i class="fab fa-pied-piper-hat"></i>Yorozuya</h2></div><br></a>
			</div>
			<div class="col-md-6"></div>
			<div class="col-md-2">
				<details><br>
					<summary  class="btn" style="color: white"><i class="fas fa-user-circle usuario"></i> <?= "Bienvenido: ".$this->session->userdata('usuario') ?></summary><br>
					<div class="cardUser">
						<i class="fas fa-user-circle usuario2"></i>
						<h4><?= $this->session->userdata('usuario') ?></h4>
						<h5><?= $this->session->userdata('correo') ?></h5>
						<br><br>
						<hr>
						<!--a class="btn btn-info btn-block" href="#"  data-toggle="modal" data-target="#modalCambClave">Cambiar clave</a-->
						<a class="btn btn-info btn-block" href="<?php echo base_url('login_controller/cerrar');?>"><i class="fas fa-power-off"></i> Cerrar sesión</a>
					</div>

				</details>

			</div>

		</div>
	</div>
</div>

<nav class="nav_sistema sticky-left">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">

				<br><br><br>
				<ul class="cacha">
				
					<a class="lammar active" href="<?php echo base_url('inicio_controller')?>"><li class="trueno"><i class="fas fa-home"></i> Inicio</li></a>

					<a class="lammar" href="<?php echo base_url('usuario_controller')?>"><li class="trueno"><i class="fas fa-user-check"></i> Usuarios</li></a>

					<a class="lammar" href="<?php echo base_url('cliente_controller')?>"><li class="trueno"><i class="fas fa-user-tag"></i>Clientes</li></a>

					<a class="lammar activo" href="<?php echo base_url('reserva_controller')?>"><li class="trueno"><i class="fas fa-clipboard-list"></i> Reservación</li></a>

					<a class="lammar" href="<?php echo base_url('empleado_controller')?>"><li class="trueno"><i class="fas fa-briefcase"></i> Empleados</li></a>

					<a class="lammar" href="<?php echo base_url('destino_controller')?>"><li class="trueno"><i class="fas fa-map-marker-alt"></i> Destinos</li></a>

					<a class="lammar" href="<?php echo base_url('transporte_controller')?>"><li class="trueno"><i class="fas fa-bus-alt"></i> Transporte</li></a>

					<a class="lammar" href="<?php echo base_url('calendario_controller')?>"><li class="trueno"><i class="fas fa-calendar-alt"></i> Calendarización</li></a>
					<li class="trueno"></li>
				</ul>
			</div>
		</div>
	</div>
</nav>



<!-- The Modal -->
<div class="modal fade" id="modalCambClave">
	<div class="modal-dialog modal-md">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title" >Cambiar Clave</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form id="form_clave" action="" method="POST" >
					<div class="row">
						<div class="col-md-6">Clave actual</div>
						<div class="col-md-6"><input type="password" class="form-control" name="cActual" id="cActual" placeholder="Digite su clave actual..."></div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6">Nueva clave</div>
						<div class="col-md-6"><input type="password" class="form-control" name="cNueva" id="cNueva" placeholder="Digite su nueva clave..."></div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6">Confirme su clave</div>
						<div class="col-md-6"><input type="password" class="form-control" name="cNueva2" id="cNueva2" placeholder="Confirme su nueva clave..."></div>
						<br>
						<div id="infoClave"></div>
					</div>
					
				</form>							
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" id="btnCambiar" class="btn btn-primary">Cambiar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>

		</div>
	</div>

</div>


