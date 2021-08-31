	<?php if (isset($msj)) { 

		if ($msj=="Error"){ ?>
			<script type="text/javascript">
			//Alerta que se mostrara al eliminar
			alertify.notify('Error al validar sus credenciales!','error',10, null);
			alertify.notify('Si cree que existe un error de sistema, contacte con el administrador.','warning',15, null);
		</script>	
		<?php } //Fin alert Error
		
		if ($msj=="errorCorreo"){ ?>
			<script type="text/javascript">
				alertify.notify('El correo digitado no se encuentra registrado en nuestra base de datos!','error',10, null);
			</script>
		<?php } //Fin alert Error correo no registrado

		if ($msj=="okCorreo"){ ?>
			<script type="text/javascript">
				alertify.notify('Se envio su contraseña al correo especificado!','success',10, null);
			</script>
		<?php } //Fin alert correo enviado

		if ($msj=="errorEnviar"){ ?>
			<script type="text/javascript">
				alertify.notify('El correo no pudo ser enviado!!','error',10, null);
				alertify.notify('Contacte con el administrador del sistema.','warning',15, null);
			</script>
		<?php }//Fin alert error al enviar correo ?>
		
		<?php } ?>