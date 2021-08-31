<script>
	$(document).ready(function(){
		mostrarRegistro();

		function mostrarRegistro(){
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url("registroReservaC/readDatos")?>',
				dataType: 'json',

				success: function(datos){
					var tabla = '';
					var i;
					var num = 1;

					for(i=0; i<datos.length; i++){
						tabla +=
						'<tr>'+
						'<td>'+num+'</td>'+
						'<td>'+datos[i].nombre_empleado+' '+datos[i].apellido_empleado+'</td>'+
						'<td>'+datos[i].fecha_reserva+'</td>'+
						'<td>'+datos[i].fecha_registro+'</td>'+
						'<td>'+datos[i].n_adultos+'</td>'+
						'<td>'+datos[i].n_ninos+'</td>'+
						'<td>$'+datos[i].residuo+'</td>'+
						'<td>'+datos[i].total_pagar+'</td>'+
						'<td>'+datos[i].nombre_estado+'</td>'+

						'<td>'+'<a href="javascript:;" class="btn btn-outline-info btn-lg editar" data-toggle="tooltip" data-placement="bottom" title="Actualizar registro" data="'+datos[i].id_registro+'"><i class="fas fa-redo"></i></a>'+'</td>'+
						'</tr>';
						num++;
					}//end for
					$('#tablaRegistro').html(tabla);
				}
			});
		}



			$('#tablaRegistro').on('click', '.editar', function(){
				var id = $(this).attr('data');

				$('#registro').modal('show');
				$('#registro').find('.modal-title').text('Editar registro');
				$('#formRegistro').attr('action','<?php echo base_url('registroReservaC/actualizar')?>');


				$.ajax({
					type: 'ajax',
					method: 'post',
					url: '<?php echo base_url('registroReservaC/cargarID')?>',
					data: {id:id},
					dataType: 'json',


					success: function(datos){
						$('#id').val(datos.id_registro);
						$('#fecha_reserva').val(datos.fecha_reserva);
						$('#nombre_empleado').val(datos.id_empleado);
						$('#nombre_establecimiento').val(datos.id_exd);
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