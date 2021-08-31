<script type="text/javascript">
	$(document).ready(function(){
		mostrar_cliente();
		function mostrar_cliente(){
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url('cliente_controller/get_cliente')  ?>',
				dataType: 'json',
				success: function(datos){

					var tabla = '';
					var i;
					var n=1;
					for(i=0; i<datos.length; i++){
						tabla+=
						'<tr>'+
						'<td>'+n+'</td>'+	
						'<td>'+datos[i].nombre_cliente+' '+datos[i].apellido_cliente+'</td>'+
						'<td>'+datos[i].DUI+'</td>'+
						'<td>'+datos[i].fecha_nac +'</td>'+
						'<td>'+datos[i].direccion+'</td>'+
						'<td>'+datos[i].correo+'</td>'+
						'<td>'+datos[i].telefono+'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-outline-danger btn-lg borrar" data-toggle="tooltip" data-placement="bottom" title="Eliminar registro" data="'+datos[i].id_cliente+'"><i class="fas fa-trash-alt"></i></a>'+

						'<td>'+'<a href="javascript:;" class="btn btn-outline-info btn-lg  item-edit" data="'+datos[i].id_cliente+'"><i class="fas fa-redo"></i></a>'+
						'</td>'+
						'</tr>';
						n++;

					}
					$('#tabla_clientes').html(tabla);
				},

			});

		}// fin tabla//
		$('#tabla_clientes').on('click', '.borrar', function(){
			$id = $(this).attr('data');
			$('#modalBorrar').modal('show');
			$('#btnBorrar').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: '<?php echo base_url('cliente_controller/eliminar')  ?>',
					data: {id:$id},
					dataType: 'json',
					success: function(respuesta){
						$('#modalBorrar').modal('hide');
						if(respuesta==true){
							alertify.notify('Eliminado exitosamente', 'success',10 , null);
							mostrar_cliente();
						}else{
							alertify.notify('Error al eliminar', 'error', 10, null);
						}
						



					}

				});
			});

		});//fin fe borrar//
		$('#nueCli').click(function(){
			$('#cliente').modal('show');
			$('#cliente').find('.modal-title').text('Nuevo cliente');
			$('#formCliente').attr('action', '<?php  echo base_url('cliente_controller/ingresar')  ?>');


		});	
		$('#btnGuardar').click(function(){
			$res = validarCliente();
			if($res == true){

				
				$url = $('#formCliente').attr('action');
				$data = $('#formCliente').serialize();

				$.ajax({
					type: 'ajax',
					method: 'post',
					url: $url,
					data: $data,
					dataType: 'json',
					success: function(respuesta){
						$('#cliente').modal('hide');

						if (respuesta == 'add'){
							alertify.notify('Ingresado exitosamente!', 'success', 5 , null);

						}else if(respuesta == 'edit'){
							alertify.notify('Actulizado exitosamente' , 'success', 5 , null);
						}else{
							alertify.notify('Error al insertar dato', 'error', 5 , null);
						}
						$('#formCliente')[0].reset();
						mostrar_cliente();	

					}

				});
			}
	});// fin de ingresar datos// 
		$('#tabla_clientes').on('click', '.item-edit', function(){
			var id = $(this).attr('data');
			$('#cliente').modal('show');
			$('#cliente').find('.modal-title').text('Editar Registro');
			$('#formCliente').attr('action', '<?php echo base_url('cliente_controller/actualizar')  ?>');
			
			$.ajax({
				type: 'ajax',
				method: 'post',
				url: '<?php echo base_url('cliente_controller/get_datos') ?>',
				data: {id:id},
				dataType: 'json',
				success: function(datos){
					$('#id').val(datos.id_cliente);
					$('#nombre_cliente').val(datos.nombre_cliente);
					$('#apellido_cliente').val(datos.apellido_cliente);
					$('#fecha_nac').val(datos.fecha_nac);
					$('#DUI').val(datos.DUI);
					$('#correo').val(datos.correo);
					$('#direccion').val(datos.direccion);
					$('#telefono').val(datos.telefono);

				}

			});

		});





		
	});

</script>