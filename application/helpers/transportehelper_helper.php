<script>	
	$(document).ready(function(){
		mostrar_transporte();
		function mostrar_transporte(){
			$.ajax({
				type: 'ajax',
				url: '<?php  echo base_url('transporte_controller/get_transporte')  ?>',
				dataType: 'json',
				success: function(datos){
					var tabla = '';
					var i;
					var n=1;
					for (i=0; i<datos.length; i++) {
						tabla+=
						'<tr>'+
						'<td>'+n+'</td>'+
						'<td>'+datos[i].nombre_empleado+ ' '+datos[i].apellido_empleado+'</td>'+
						'<td>'+datos[i].respuesta+'</td>'+
						
						'<td>'+datos[i].placa +'</td>'+
						'<td>'+datos[i].modelo +'</td>'+
						'<td>'+datos[i].marca +'</td>'+
						'<td>'+datos[i].capacidad +'</td>'+

						'<td>'+datos[i].nombre_estadoT +'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-outline-danger btn-lg borrar" data-toggle="tooltip" data-placement="bottom" title="Eliminar registro" data="'+datos[i].id_transporte+'"><i class="fas fa-trash-alt"></i></a>'+
						'<td>'+'<a href="javascript:;" class="btn btn-outline-info btn-lg  item-edit" data="'+datos[i].id_transporte+'"><i class="fas fa-redo"></i></a>'+
						'</td>'+
						'</tr>';
						n++;

					}
					$('#tabla_transporte').html(tabla);

				}


			});

		} //fin de mostrar tabla
		$('#tabla_transporte').on('click', '.borrar',function(){
			$id = $(this).attr('data');
			$('#deleteModal').modal('show');
			$('#btnBorrar').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: '<?php echo base_url('transporte_controller/eliminar')  ?>',
					data: {id:$id},
					dataType: 'json',
					success: function(respuesta){
						if (respuesta==true){ 
							$('#deleteModal').modal('hide');
							alertify.notify('Elimiando exitosamente!', 'success', 10, null);
							mostrar_transporte();
						}else{
							$('#deleteModal').modal('hide');
							alertify.notify('Ocurrio un error al eliminar!', 'error', 10, null);
						}
					}                                        
				});

			});
		});
		get_empleado();
		function get_empleado(){
			$.ajax({

				type: 'ajax',

				url: '<?php echo base_url('transporte_controller/get_empleado') ?>',

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
		
		get_estadoT();
		function get_estadoT(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('transporte_controller/get_estadoT')  ?>',
				dataType: 'json',
				success: function(datos){
					var dataT = '';
					var i;
					dataT+="<option value=''>--Seleccione disponibilidad--</option>";
					for(i = 0; i< datos.length; i++){
						dataT +=
						"<option value='"+datos[i].id_estadoT+"'>"+datos[i].nombre_estadoT+"</option>";
					}
					$('#nombre_estadoT').html(dataT);
				},


			});
		}
		
		$('#transporteD').click(function(){

			$('#transporte').modal('show');

			$('#transporte').find('.modal-title').text('Nuevo transporte');

			$('#formTransporte').attr('action', '<?php echo base_url() ?>transporte_controller/ingresar');
		});
		$('#btnGuardar').click(function(){
			$url = $('#formTransporte').attr('action');
			$data = $('#formTransporte').serialize();


			$.ajax({
				type: 'ajax',
				method: 'post',
				url: $url,
				data: $data,
				dataType: 'json',

				success: function(respuesta){
					$('#transporte').modal('hide');
					if(respuesta=='add'){

						alertify.notify('Ingresado exitosamente!', 'success',10, null);
					}else if(respuesta=='edi'){

						alertify.notify('Actualizado exitosamente!', 'success',10, null);
					}else{

						alertify.notify('error al ingresar!', 'error',10, null);
					}
					$('#formTransporte')[0].reset();
					mostrar_transporte();
				}
			});

		});
			$('#tabla_transporte').on('click', '.item-edit', function(){
			var id = $(this).attr('data');
			$('#transporte').modal('show');
			$('#transporte').find('.modal-title').text('Editar Registro');
			$('#formTransporte').attr('action', '<?php echo base_url('transporte_controller/actualizar')  ?>');
			
			$.ajax({
				type: 'ajax',
				method: 'post',
				url: '<?php echo base_url('transporte_controller/get_datos') ?>',
				data: {id:id},
				dataType: 'json',
				success: function(datos){
					$('#id').val(datos.id_transporte);
					$('#nombre_empleado').val(datos.id_empleado);
					$('#marca').val(datos.marca);
					$('#modelo').val(datos.modelo);
					$('#placa').val(datos.placa);
					$('#capacidad').val(datos.capacidad);
					$('#nombre_estadoT').val(datos.id_estadoT);
					
				},

			});

		});
		



	});



</script>