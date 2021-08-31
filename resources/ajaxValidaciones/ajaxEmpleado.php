<script>
	
	$(document).ready(function(){
		$("#DUI").blur(function(){
			$id = $("#DUI").val();
			$.ajax({
				type: 'ajax',
				method: 'post',
				url: '<?= base_url('empleado_controller/ajaxDUI') ?>',
				data: {DUI:$id},
				dataType: 'json',
				success: function(respuesta){

					if(respuesta == true){
						$("#validaDUI").text('El DUI ya esta registrado');
						$("#btnGuardar").attr('disabled', true);
					}

					else{
						$("#validaDUI").text('');
						$("#btnGuardar").attr('disabled', false);
					}
				},
			});
		});
	});



</script>