<script>
	$(document).ready(function(){
		mostrarReserva();

		function mostrarReserva(){
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url("reserva_controller/leer")?>',
				dataType: 'json',

				success: function(datos){
					var tabla = '';
					var i;
					var num = 1;

					for(i=0; i<datos.length; i++){
						tabla +=
						'<tr>'+
						'<td>'+num+'</td>'+
						'<td>'+datos[i].fecha_reserva+'</td>'+
						'<td>'+datos[i].nombre_empleado+' '+datos[i].apellido_empleado+'</td>'+
						'<td>'+datos[i].nombre_destino+' '+datos[i].fecha_salida+'</td>'+
						'<td>'+datos[i].fecha_salida+'</td>'+
						'<td>'+datos[i].nombre_cliente+' '+datos[i].apellido_cliente+'</td>'+
						'<td>'+datos[i].n_adultos+'</td>'+
						'<td>'+datos[i].n_ninos+'</td>'+
						'<td>$'+datos[i].total_pagar+'</td>'+
						'<td>$'+datos[i].abono+'</td>'+
						'<td>$'+datos[i].residuo+'</td>'+
						'<td>'+datos[i].nombre_estado+'</td>'+


						'<td>'+'<a href="javascript:;" class="btn btn-outline-danger btn-lg eliminar1" data-toggle="tooltip" data-placement="bottom" title="Eliminar registro" data="'+datos[i].id_reservacion+'"><i class="fas fa-trash-alt"></i></a>'+'</td>'+

						'<td>'+'<a href="javascript:;" class="btn btn-outline-info btn-lg editar" data-toggle="tooltip" data-placement="bottom" title="Actualizar registro" data="'+datos[i].id_reservacion+'"><i class="fas fa-redo"></i></a>'+'</td>'+
						'</tr>';
						num++;
					}//end for
					$('#datos_reserva').html(tabla);
				}
			});
		}
			//DELETE
			$('#datos_reserva').on('click', '.eliminar1', function(){
				$id = $(this).attr('data');
				$('#modalBorrar').modal('show');

				$('#btnBorrar').unbind().click(function(){
					$.ajax({
						type: 'ajax',
						method: 'post',
						url: '<?php echo base_url('reserva_controller/eliminar')?>',
						data: {id:$id},
						dataType: 'json',

						success: function(respuesta){
							$('#modalBorrar').modal('hide');

							if(respuesta==true){
								alertify.notify('<i class="far fa-check-circle"></i> Eliminado exitosamente!', 'success', 10, null);
								mostrarReserva();

							}else{
								alertify.notify('<i class="fas fa-exclamation-triangle"></i> Error al eliminar!', 'error', 10, null);
							}
						}
					});
				});

			});

			$('#btnNuevo').click(function(){
				$('#reserva').modal('show');
				$('#reserva').find('.modal-title').text('Nueva reserva');
				$('#formReserva').attr('action','<?php echo base_url('reserva_controller/insertar')?>');
			});


			//LLENAR SELECT
			empleado();
			function empleado(){
				$.ajax({

					type: 'ajax',

					url: '<?php echo base_url('reserva_controller/empleado') ?>',

					dataType: 'json',

					success: function(datos){
						var op0 = '';

						var i;

						op0 +='<option value="">-Seleccione empleado-</option>';

						for(i = 0; i < datos.length; i++){
							op0 +='<option value="'+datos[i].id_empleado+'">'+datos[i].nombre_empleado+' '+datos[i].apellido_empleado+'</option>';
						}
						$('#nombre_empleado').html(op0);
					}
				});
			}

			destino();
			function destino(){
				$.ajax({
					type: 'ajax',

					url: '<?= base_url('reserva_controller/destino') ?>',

					dataType: 'json',

					success: function(datos){

						var op1 = '';
						var i;

						op1 +="<option value=''>--Seleccione destino--</option>";
						for(i=0; i<datos.length; i++){
							op1+='<option value="'+datos[i].id_asignacion+'">'+datos[i].nombre_destino+' '+datos[i].fecha_salida+'</option>';
						}

						$('#nombre_destino').html(op1);
					}
				});
			}


			cliente();
			function cliente(){
				$.ajax({
					type: 'ajax',
					url: '<?= base_url('reserva_controller/cliente') ?>',
					dataType: 'json',

					success: function(datos){

						var op3 = '';
						var i;

						op3 +="<option value=''>--Seleccione cliente--</option>";
						for(i=0; i<datos.length; i++){
							op3 +="<option value='"+datos[i].id_cliente+"'>"+datos[i].nombre_cliente+' '+datos[i].apellido_cliente+"</option>";
						}

						$('#nombre_cliente').html(op3);
					}
				});
			}


			estado();
			function estado(){
				$.ajax({
					type: 'ajax',
					url: '<?= base_url('reserva_controller/estado') ?>',
					dataType: 'json',

					success: function(datos){

						var op5 = '';
						var i;

						op5 +="<option value=''>--Seleccione estado--</option>";
						for(i=0; i<datos.length; i++){
							op5 +="<option value='"+datos[i].id_estado+"'>"+datos[i].nombre_estado+"</option>";
						}
						$('#nombre_estado').html(op5);
					}
				});
			}


			
			$('#btnGuardar').click(function(){
				$url = $('#formReserva').attr('action');
				$data = $('#formReserva').serialize();


				$.ajax({
					type: 'ajax',
					method: 'post',
					url: $url,
					data: $data,
					dataType: 'json',

					success: function(respuesta){
						$('#reserva').modal('hide');
						if(respuesta=='add'){

							alertify.notify('<i class="fas fa-save"></i> Ingresado exitosamente!', 'success',10, null);
						}else if(respuesta=='edi'){

							alertify.notify('Actualizado exitosamente!', 'success',10, null);
						}else if(respuesta=='dont'){

							alertify.notify('No se realizo ningun cambio!', 'success',10, null);
						}else{

							alertify.notify('error al ingresar!', 'error',10, null);
						}
						$('#formReserva')[0].reset();
						mostrarReserva();
					}
				});

			});

			//update

			$('#datos_reserva').on('click', '.editar', function(){
				var id = $(this).attr('data');

				$('#reserva').modal('show');
				$('#reserva').find('.modal-title').text('Editar reserva');
				$('#formReserva').attr('action','<?php echo base_url('reserva_controller/actualizar')?>');


				$.ajax({
					type: 'ajax',
					method: 'post',
					url: '<?php echo base_url('reserva_controller/cargarID')?>',
					data: {id:id},
					dataType: 'json',


					success: function(datos){
						$('#id').val(datos.id_reservacion);
						$('#fecha_reserva').val(datos.fecha_reserva);
						$('#nombre_empleado').val(datos.id_empleado);
						$('#nombre_destino').val(datos.id_asignacion);
						$('#fecha_salida').val(datos.fecha_salida);
						$('#nombre_cliente').val(datos.id_cliente);
						$('#n_adultos').val(datos.n_adultos);
						$('#n_ninos').val(datos.n_ninos);
						$('#total_pagar').val(datos.total_pagar);
						$('#abono').val(datos.abono);
						$('#residuo').val(datos.residuo);
						$('#nombre_estado').val(datos.id_estado);
					}
				});
			});

		});//end program

	</script>