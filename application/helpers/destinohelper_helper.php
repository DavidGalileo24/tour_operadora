<script>
	$(document).ready(function(){
//-----------------------function en ajax para mostrar los datos de la tabla destino de la db--------------------------//
mostrarD();

function mostrarD(){

	$.ajax({

		type: 'ajax',

		url: '<?php echo base_url('destino_controller/mostrar_destino') ?>',

		dataType: 'json',

		success: function(datos){

			var tabla = '';

			var i;

			var n = 1;

			for (i = 0; i < datos.length; i++) {

				tabla +=

				'<tr>'+
				'<td class="text-center">'+n+'</td>'+
				'<td class="text-center" style="width: 7%">'+datos[i].nombre_destino+'</td>'+
				'<td class="text-center" style="width: 6%">'+datos[i].nombre_categoria+'</td>'+
				'<td class="text-center" style="width: 30%">'+datos[i].descripcion+'</td>'+

				'<td class="text-center" style="width: 7%">'+datos[i].nombre_departamento+'</td>'+
				'<td class="text-center" style="width: 25%">'+datos[i].direccion+'</td>'+

				'<td class="text-center"><a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Eliminar registro" class="btn btn-outline-danger btn-lg eliminar" data="'+datos[i].id_destino+'"><i class="fas fa-trash-alt"></i></a></td>'+

				'<td class="text-center"><a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Actualizar registro" class="btn btn-outline-info btn-lg actualizar" data="'+datos[i].id_destino+'"><i class="fas fa-redo"></i></a></td>'+
				'</tr>';

				n++;
			}

			$('#tabla_destino').html(tabla);
		}
	});
}
$('#tabla_destino').on('click', '.eliminar',function(){
	$id = $(this).attr('data');
	$('#modalBorrar').modal('show'); 

	$('#btnBorrar').unbind().click(function(){ 
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: '<?= base_url('destino_controller/eliminarD') ?>',
			data: {id:$id},
			dataType: 'json',

			success: function(respuesta){
				$('#modalBorrar').modal('hide');
				if (respuesta == true) {
					alertify.notify('Eliminado exitosamente!', 'success',10,null);
					mostrarD();

				}else{
					alertify.notify('Error al eliminar!', 'error',10,null);
				}
			}
		});
	});

});
//-----------------------fin function en ajax para mostrar los datos de la tabla destino de la db----------------------//

//-----------------------function en ajax para insert los datos de la tabla destino de la db-------------------------//
$('#new_registro').click(function(){
	$('#destino').modal('show');

	$('#destino').find('.modal-title').text('Nuevo destino');

	$('#form_destino').attr('action','<?php echo base_url('destino_controller/ingresar_destino') ?>');
});
	//-------------------------llamando los datos de los select------------------------------//
	mostrar_categoria();

	function mostrar_categoria(){

		$.ajax({

			type: 'ajax',

			url: '<?php echo base_url('destino_controller/select_categoria') ?>',

			dataType: 'json',

			success: function(datos){

				var akeno = '';

				var i;

				akeno +='<option value="">----Seleccione una categoria----</option>';

				for(i = 0; i < datos.length; i++){
					akeno +='<option value="'+datos[i].id_categoria+'">'+datos[i].nombre_categoria+'</option>';
				}

				$('#categoria').html(akeno);
			}
		});
	}
	mostrar_departamento();

	function mostrar_departamento(){

		$.ajax({

			type: 'ajax',

			url: '<?php echo base_url('destino_controller/select_departamento') ?>',

			dataType: 'json',

			success: function(datos){

				var koneko = '';

				var i;

				koneko +='<option value="">----Seleccione un departamento----</option>';

				for(i = 0; i < datos.length; i++){

					koneko +='<option value="'+datos[i].id_departamento+'">'+datos[i].nombre_departamento+'</option>';
				}
				$('#departamento').html(koneko);
			}
		});
	}
	//-------------------------fin llamando los datos de los select--------------------------//
	$('#btn_guardar').on('click',function(){
		

		$url = $('#form_destino').attr('action');
		$data = $('#form_destino').serialize();

		$.ajax({

			type: 'ajax',
			method: 'post',
			url: $url,
			data: $data,
			dataType: 'json',

			success: function(respuesta){

				$('#destino').modal('hide');

				if(respuesta == 'add'){

					alertify.notify('Datos insertados correctamente <i class="far fa-check-circle"></i>','success',10, null);
				}else if(respuesta == 'edit'){

					alertify.notify('<i class="fas fa-file-alt"></i> Datos editados correctamente ','success','success',10, null);
				}else if (respuesta == 'dont'){

					alertify.notify('<i class="fas fa-exclamation-circle"></i> No se modificaron los datos ','error',10, null);
				}else{
					alertify.notify('Datos insertados correctamente <i class="far fa-check-circle"></i>', 'success',10, null);
				}

				$('#form_destino')[0].reset();

				mostrarD();
			}
		});
	});

//-----------------------------------------------------------------------------------------------------------------------//
//	$(function() {
  //      $("#imagen").change(function() {

//			var file = this.files[0];

//			var imagefile = file.type;

//			var match= ["image/jpeg","image/png","image/jpg"];

//			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){

//			$('#noimage').attr('src','noimage.png');
//			return false;
//			}else{

//                var reader = new FileReader();

//                reader.onload = imageIsLoaded;

//                reader.readAsDataURL(this.files[0]);
//            }		
//        });
//    });
//----------------------------------------------------------------------------------------------------------------------//
//function imageIsLoaded(e) { 
//		$("#imagen").css("color","green");
//        $('#image_preview').css("display", "block");
//        $('#noimage').attr('src', e.target.result);
//		$('#noimage').attr('width', '250px');
//		$('#noimage').attr('height', '230px');
//	};
//-----------------------fin function en ajax para insertar los datos de la tabla destino de la db----------------------//
//ACTUALIZAR
$('#tabla_destino').on('click', '.actualizar', function(){
	
	var id = $(this).attr('data');

	$('#destino').modal('show');
	$('#destino').find('.modal-title').text('Editar destino');
	$('#form_destino').attr('action','<?= base_url('destino_controller/actualizar')?>');

	$.ajax({

		type: 'ajax',
		method: 'post',
		url: '<?= base_url('destino_controller/get_datos')?>',
		data: {id:id},
		dataType: 'json',

		success: function(datos){

			$('#id').val(datos.id_destino);
			$('#nombre_destino').val(datos.nombre_destino);
			$('#categoria').val(datos.id_categoria);
			$('#descripcion').val(datos.descripcion);
			$('#departamento').val(datos.id_departamento);
			$('#direccion').val(datos.direccion);

		}
	});
		});//
});
</script>