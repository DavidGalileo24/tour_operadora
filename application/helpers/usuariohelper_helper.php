<script>
	$(document).ready(function(){
		mostrarU();

		function mostrarU(){
			$.ajax({
				type: 'ajax',

				url: '<?php echo base_url('usuario_controller/mostrar_usuario') ?>',

				dataType: 'json',

				success: function(datos){

					var tabla = '';

					var i;

					var n = 1;

					for(i = 0; i < datos.length; i++){

						tabla +=
						'<tr>'+
						'<td>'+n+'</td>'+
						'<td>'+datos[i].nombre_empleado+' '+datos[i].apellido_empleado+'</td>'+
						'<td>'+datos[i].nombre_cargo+'</td>'+
						'<td>'+datos[i].correo+'</td>'+
						'<td>'+datos[i].usuario+'</td>'+
						'<td>'+datos[i].nombre_rol+'</td>'+
						'<td><a href="javascript:;" class="btn btn-outline-danger btn-lg eliminar" data-toggle="tooltip" data-placement="bottom" title="Eliminar registro" data="'+datos[i].id_empleado+'"><i class="fas fa-trash-alt"></i></a></td>'+
						
						'</tr>';
						n++;
					}
					$('#s').html(tabla);
				}
			});
		};
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
	$('#s').on('click','.eliminar',function(){

		$id = $(this).attr('data');
		$('#modalBorrar').modal('show');

		$('#btnBorrar').unbind().click(function(){
			$.ajax({
				type: 'ajax',

				method: 'post',

				url: '<?php echo base_url('usuario_controller/eliminar') ?>',

				data: {id:$id},

				dataType: 'json',
				
				success: function(respuesta){
					$('#modalBorrar').modal('hide');

					if(respuesta == true){
						alertify.notify('<i class="far fa-check-circle"></i>   Eliminado exitosamente!', 'success', 10, null);

						mostrarU();
					}else{
						alertify.notify('<i class="fas fa-exclamation-triangle"></i> Error al eliminar!', 'error', 10, null);
					}
				}
			});
		});
	});
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
	$('#new_user').click(function(){
		$('#nuevo').modal('show');
		$('#formu').attr('action','<?php echo base_url('usuario_controller/ingresar') ?>');
	});
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
	select_empleado();

	function select_empleado(){
		$.ajax({

			type: 'ajax',

			url: '<?php echo base_url('usuario_controller/mostrar_empleado') ?>',

			dataType: 'json',

			success: function(datos){

				var op = '';



				var i;

				op +='<option value="">Seleccione un empleado para agregar usuario</option>';

				for(i = 0; i < datos.length; i++){

					op+='<option value="'+datos[i].id_empleado+'">'+datos[i].nombre_empleado+' '+datos[i].apellido_empleado+' '+datos[i].nombre_cargo+'</option>';
				}
				$('#cmb_empleado').html(op);
			}
		});
	}
	select_rol();

	function select_rol(){
		$.ajax({

			type: 'ajax',

			url: '<?php echo base_url('usuario_controller/mostrar_rol') ?>',

			dataType: 'json',

			success: function(datos){

				var op = '';

				var i;

				op +='<option value="">Seleccione un rol para el empleado</option>';

				for(i = 0; i < datos.length; i++){

					op+='<option value="'+datos[i].id_rol+'"><p class="text-center">'+datos[i].nombre_rol+'</p></option>';
				}
				$('#cmb_rol').html(op);
			}
		});
	}
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
	$('#btnGuardar').click(function(){
		
$url = $('#formu').attr('action');
		$data = $('#formu').serialize();

		$.ajax({

			type: 'ajax',

			method: 'post',

			url: $url,

			data: $data,

			dataType: 'json',

			success: function(respuesta){
				$('#nuevo').modal('hide');

				if (respuesta == 'add'){

					alertify.notify('<i class="fas fa-save"></i>  Ingresado exitosamente!', 'success',10, null);
				}else if(respuesta=='edi'){
						
						alertify.notify('<i class="fas fa-sync"></i> Cambios realizados exitosamente!', 'success',10, null);
					}else if(respuesta=='no'){
						
						alertify.notify('<i class="fas fa-exclamation"></i>  No se hizo ningun cambio!', 'error',10, null);
					}else{
						
						alertify.notify('<i class="fas fa-exclamation-triangle"></i>  error al ingresar!', 'error',10, null);
					}
			}
		});
	});
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
	});
</script>