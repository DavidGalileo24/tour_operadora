<script type="text/javascript">
	function disponibilidadNombre($nombre_cliente){
      //Creamos una variable llamada $id en la cual guardaremos el valor digitado en el input
      //dicha variable sera la enviada a la consulta para validar si existe un correo similar

      $.ajax({  
        //Especificamos el tipo de peticion que haremos
        type: 'ajax',
        // especifica si será una petición POST o GET
        method: 'post', 
        // la URL para la petición   
        url: '<?php echo base_url('cliente_controller/validarNombre') ?>',
        // la información a enviar
        // (también es posible utilizar una cadena de datos)  
        //En este caso correo seria el parametro y $id es el valor que se capturo anteriomente del input  
        data: {nombre_cliente:$nombre_cliente},
        // el tipo de información que se espera de respuesta
        dataType: 'json',
        
        // código a ejecutar si la petición es satisfactoria;
        success: function(respuesta){  

          //el modelo devolvera con return ya sea false o true el cual evaluamos con el if
          if (respuesta==true) {
          	$r = true; 
            //Si nos devuelve true es porque SI EXISTE UN CORREO como el escrito en el input
            $("#infoNombre").text('Nombre ya registrado').css({color: 'red', fontSize: '10px'});
            $("#correo").css('boxShadow', '0 0 15px red');
        }else{
        	$r = false; 
            //Si nos devuelve false es porque NO EXISTE UN CORREO como el escrito en el input
            $("#infoNombre").text('Nombre disponible').css({color: 'green', fontSize: '10px'});
        }
    },
});
      return $r;
  };

  function validarFormulario(){

  	$nombre_cliente      = $('#nombre_cliente').val();
  	$apellido_cliente    = $('#apellido_cliente').val();
  	$DUI        = $('#DUI').val();
  	$fecha_nac      = $('#fecha_nac').val();
  	$correo        = $("#correo").val();
  	$direccion     = $("#direccion").val();
  	$telefono      = $("#telefono").val();

  	if(nombre_cliente.length == 0){
  		document.getElementById('nombre_cliente').style.border="4px solid #f67280";
  		return false;
  	}else{
  		document.getElementById('nombre_cliente').style.border="4px solid #4dd599";
  	}

  	if(apellido_cliente.length == 0){
  		document.getElementById('apellido_cliente').style.border="4px solid #f67280";
  		return false;
  	}else{
  		document.getElementById('apellido_cliente').style.border="4px solid #4dd599";
  	}

  	if(DUI.length == 0){
  		document.getElementById('DUI').style.border="4px solid #f67280";
  		return false;
  	}else{
  		document.getElementById('DUI').style.border="4px solid #4dd599";
  	}

	/*
	if(fecha_nac ==  0){
		document.getElementById('fecha_nac').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('fecha_nac').style.border="4px solid #4dd599";
	}
	*/

	if(!(/\S+@\S+\.\S+/.test(correo))){
		document.getElementById('correo').style.border="4px solid #f67280";
		$("#infoCorreo").text('Debe digitar un correo valido').css({color: 'red', fontSize: '10px'});
		return false;
	}else{
		document.getElementById('correo').style.border="4px solid #4dd599";
	}

	$resp = disponibilidadNombre($nombre_cliente);
	if($resp == true){
		return false;
	};

	if(direccion.length == 0){
		document.getElementById('direccion').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('direccion').style.border="4px solid #4dd599";
	}

	if(telefono.length == 0){
		document.getElementById('telefono').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('telefono').style.border="4px solid #4dd599";
	}

	return true;
}

</script>