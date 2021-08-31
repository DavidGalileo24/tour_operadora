<script>
	$(document).ready(function(){

	mostrarEmpleado();
		function mostrarEmpleado(){
	$.ajax({
				type: 'ajax',
				url: '<?= base_url('empleado_controller/get_empleado') ?>',
				dataType: 'json',

				success: function(datos){

					var tabla = '';
					var i;
					var n=1;

					for(i=0; i<datos.length; i++){

						tabla +=
						'<tr>'+
						'<td>'+n+'</td>'+				
						'<td>'+datos[i].DUI+'</td>'+
						'<td>'+datos[i].nombre_empleado+' '+datos[i].apellido_empleado+'</td>'+
						'<td>'+datos[i].fecha_nac+'</td>'+
						'<td>'+datos[i].direccion+'</td>'+
						'<td>'+datos[i].correo+'</td>'+
						'<td>'+datos[i].telefono+'</td>'+
						'<td>'+datos[i].respuesta+'</td>'+
						'<td>'+datos[i].nombre_cargo+'</td>'+

						'<td>'+'<a href="javascript:;" class="btn btn-outline-danger btn-lg borrar" data-toggle="tooltip" data-placement="bottom" title="Eliminar registro" data="'+datos[i].id_empleado+'"><i class="fas fa-trash-alt"></i></a>'+'</td>'+

						'<td>'+'<a href="javascript:;" class="btn btn-outline-info btn-lg item-edit" data-toggle="tooltip" data-placement="bottom" title="Actualizar registro" data="'+datos[i].id_empleado+'"><i class="fas fa-redo"></i></a>'+'</td>'+
						'</tr>';

						n++;
					}

					$('#tabla_empleado').html(tabla);

				}
			});
		}

	//**********************************************************************************************************

	//BORRAR

		$('#tabla_empleado').on('click', '.borrar', function(){
         	$id = $(this).attr('data');
         	$('#modalBorrar').modal('show'); 

         	$('#btnBorrar').unbind().click(function(){ 
         		$.ajax({
         			type: 'ajax',
         			method: 'post',
         			url: '<?= base_url('empleado_controller/eliminar') ?>',
         			data: {id:$id},
         			dataType: 'json',

         			success: function(respuesta){
         				$('#modalBorrar').modal('hide');
         				if (respuesta==true) {
         					alertify.notify('Eliminado exitosamente!', 'success',10,null);
         					mostrarEmpleado();

         				}else{
         					alertify.notify('Error al eliminar!', 'error',10,null);
         				}
         			}
         		});
         	});

		});

		//******************************************************************************

		get_licencia();

		function get_licencia(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('empleado_controller/get_licencia')?>',
				dataType: 'json',

				success: function(datos){
					var op = '';
					var i;

					op +="<option value=''>--Seleccion estado--</option>";

					for(i=0; i<datos.length; i++){

						op +="<option value='"+datos[i].id_licencia+"'>"+datos[i].respuesta+"</option>";
					}

					$('#respuesta').html(op);
				} 
			});
		}

		get_cargo();

		function get_cargo(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('empleado_controller/get_cargo')?>',
				dataType: 'json',

				success: function(datos){
					var op = '';
					var i;

					op +="<option value=''>--Seleccion cargo--</option>";

					for(i=0; i<datos.length; i++){

						op +="<option value='"+datos[i].id_cargo+"'>"+datos[i].nombre_cargo+"</option>";
					}

					$('#nombre_cargo').html(op);
				} 
			});
		}

		//***************************************************************************************

		//INGRESAR

			$('#nueEmple').click(function(){
			$('#empleado').modal('show');
			$('#empleado').find('.modal-title').text('Nuevo Empleado');
			$('#formEmpleado').attr('action','<?= base_url('empleado_controller/ingresar')?>');
			
		});

		$('#btnGuardar').click(function(){

			$url = $('#formEmpleado').attr('action');
			$data = $('#formEmpleado').serialize();

			$.ajax({
				type: 'ajax',
				method: 'post',
				url: $url,
				data: $data,
				dataType: 'json',

				success: function(respuesta){
					$('#empleado').modal('hide');

					if (respuesta=='add') {
						alertify.notify('Ingresado exitosamete!', 'success',10, null);
					}else if(respuesta=='edi'){
						alertify.notify('Actualizado exitosamente!', 'success',10, null);
					}else{
						alertify.notify('Ingresado exitosamente', 'success',10, null);
					}

					$('#formEmpleado')[0].reset();

					mostrarEmpleado();
				}
			});
		});

	//*****************************************************************************************************
//ACTUALIZAR
$('#tabla_empleado').on('click', '.item-edit', function(){
	
			var id = $(this).attr('data');

			$('#empleado').modal('show');
			$('#empleado').find('.modal-title').text('Editar Empleado');
			$('#formEmpleado').attr('action','<?= base_url('empleado_controller/actualizar')?>');

			$.ajax({

				type: 'ajax',
				method: 'post',
				url: '<?= base_url('empleado_controller/get_datos')?>',
				data: {id:id},
				dataType: 'json',

				success: function(datos){

					$('#id').val(datos.id_empleado);
					$('#DUI').val(datos.DUI);
					$('#nombre_empleado').val(datos.nombre_empleado);
					$('#apellido_empleado').val(datos.apellido_empleado);
					$('#fecha_nac').val(datos.fecha_nac);
					$('#direccion').val(datos.direccion);
					$('#correo').val(datos.correo);
					$('#telefono').val(datos.telefono);
					$('#respuesta').val(datos.id_licencia);
					$('#nombre_cargo').val(datos.id_cargo);
				}
			});
		});//

	});
</script>
