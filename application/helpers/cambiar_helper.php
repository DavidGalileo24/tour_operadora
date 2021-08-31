<script>
	 $(document).ready(function(){
	 //Cambiar Clave
    $('#btnCambiar').click(function(){

      $actual = $("#cActual").val();
      $nueva  = $("#cNueva").val();
      $confirmacion = $("#cNueva2").val();

      if($actual==""){
        $("#infoClave").text('Obligatorio digitar su clave actual!').css({color: 'red', fontSize: '10px'});
        $("#cActual").css({boxShadow: '0 0 10px red'});
        return false;
      }else{
        $("#cActual").css({boxShadow: '0 0 0px white'});
      }

      if($nueva==""){
        $("#infoClave").text('Por favor digite una clave!').css({color: 'red', fontSize: '10px'});
        $("#cNueva").css({boxShadow: '0 0 10px red'});
        return false;
      }else{
        $("#cNueva").css({boxShadow: '0 0 0px white'});
      }

      if($confirmacion==""){
        $("#infoClave").text('Por favor confirme su nueva clave!').css({color: 'red', fontSize: '10px'});
        $("#cNueva2").css({boxShadow: '0 0 10px red'});
        return false;
      }else{
        $("#cNueva2").css({boxShadow: '0 0 0px white'});
      }      

      if($nueva === $confirmacion){

        $data = $('#formCambClave').serialize();

        $.ajax({
          type: 'ajax',
          method: 'post',
          url: '<?= base_url('login_controller/cambiar_clave') ?>',
          data: $data,
          dataType: 'json',

          success: function(respuesta){
      //Ocultamos el modal
      $('#modalCambClave').modal('hide');

      if(respuesta=="no es clave actual"){
        //Alerta que se mostrara al cuando se inserto
        alertify.notify('La clave actual es incorrecta!','error',10, null);
      }else if(respuesta=="misma clave") {
        //Alerta que se mostrara al cuando se inserto
        alertify.notify('No puede utilizar como NUEVA CLAVE la que tiene actualmente','error',10, null);
      }else if(respuesta=="error"){
        //Alerta que se mostrara al Actualizar
        alertify.notify('Ocurrio un error al actualizar su clave.','Error',15, null);
        alertify.notify('Por favor contacte con el administrador del sistema.','error',15, null);
      }else{
        //Alerta que se mostrara al Actualizar
        alertify.notify('Clave cambiada exitosamente! La proxima vez que inicie sesión utilice su nueva clave','success',10, null);
        $("#cNueva").css({boxShadow: '0 0 0px white'});
        $("#cNueva2").css({boxShadow: '0 0 0px white'});
        $("#infoClave").text('');
      }
      $('#formCambClave')[0].reset();

    }
  });


      }else{
        $("#infoClave").text('Las claves NO coinciden').css({color: 'red', fontSize: '10px'});
        $("#cNueva").css({boxShadow: '0 0 10px red'});
        $("#cNueva2").css({boxShadow: '0 0 10px red'});
        return false;
      }


    });

});
</script>