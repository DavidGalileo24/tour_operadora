<?php

	if($this->session->userdata('logueado')==false){
	redirect('login_controller');	
}

?>
<body>
	<div class="contenedor_body">
		<a href="<?php echo base_url('inicio_controller')?>"><div class="locate"><h1 class="logologo2 text-center"><i class="fab fa-pied-piper-hat"></i>Yorozuya tours!</h1></div><br></a>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<img src="<?php echo base_url('resources/images/icons/turista.png')?>" alt="" width="75%" height="50%" class="img-fluid img-responsive">
				</div>
				<div class="col-md-6 init">
					<div class="uno1" data-toggle="tooltip" data-placement="left" title="Viajes del mes"><h3><i class="fas fa-calendar-check lua"></i>   Eventos próximos</h3></div>

					<div class="uno1" data-toggle="tooltip" data-placement="left" title="¿Que deseas cambiar?"><h3><i class="fas fa-cog lua"></i>   Configuraciones</h3></div>
					
					<a download href="<?php echo base_url('resources/manual_de_usuario.pdf')?>"><div class="uno1" data-toggle="tooltip" data-placement="left" title="¡Descarga el manual de usuario!"><h3><i class="fas fa-book-reader lua"></i>   Manual de usuario</h3></div></a>

					<div class="uno1" data-toggle="tooltip" data-placement="left" title="¡Siguenos en nuestras redes sociales!"><h3><i class="fas fa-paper-plane lua"></i>   Encuentrános</h3></div>
				</div>
			</div>
		</div>

	</div>









