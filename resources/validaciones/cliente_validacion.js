
function validarCliente(){
	
	var nombre_cliente   = document.getElementById('nombre_cliente').value;
	var apellido_cliente = document.getElementById('apellido_cliente').value;
	var DUI = document.getElementById('DUI').value;
	var fecha_nac = document.getElementById('fecha_nac').value;
	var correo = document.getElementById('correo').value;
	var direccion = document.getElementById('direccion').value;
	var telefono = document.getElementById('telefono').value;
	

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

	
	if(fecha_nac ==  0){
		document.getElementById('fecha_nac').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('fecha_nac').style.border="4px solid #4dd599";
	}


	if(!(/\S+@\S+\.\S+/.test(correo))){
		document.getElementById('correo').style.border="4px solid #f67280";
		
		return false;
	}else{
		document.getElementById('correo').style.border="4px solid #4dd599";
	}

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