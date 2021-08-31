
function validacionEmpleados(){
	var DUI = document.getElementById('DUI').value;
	var nombre_empleado = document.getElementById('nombre_empleado').value;
	var apellido_empleado = document.getElementById('apellido_empleado').value;
	var fecha_nac = document.getElementById('fecha_nac').value;
	var direccion = document.getElementById('direccion').value;
	var correo = document.getElementById('correo').value;
	var telefono = document.getElementById('telefono').value;
	var respuesta = document.getElementById('respuesta').selectedIndex;
	var nombre_cargo = document.getElementById('nombre_cargo').selectedIndex;

	if(DUI.length == 0){
		document.getElementById('DUI').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('DUI').style.border="4px solid #4dd599";
	}
	if(nombre_empleado.length == 0){
		document.getElementById('nombre_empleado').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('nombre_empleado').style.border="4px solid #4dd599";
	}
	if(apellido_empleado.length == 0){
		document.getElementById('apellido_empleado').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('apellido_empleado').style.border="4px solid #4dd599";
	}
	/*
	if(fecha_nac.length == 0){
		document.getElementById('fecha_nac').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('fecha_nac').style.border="4px solid #4dd599";
	}
	*/
	if(direccion.length == 0){
		document.getElementById('direccion').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('direccion').style.border="4px solid #4dd599";
	}
	if(!(/\S+@\S+\.\S+/.test(correo))){
		document.getElementById('correo').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('correo').style.border="4px solid #4dd599";
	}
	if(telefono.length == 0){
		document.getElementById('telefono').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('telefono').style.border="4px solid #4dd599";
	}
	if(respuesta == 0){
		document.getElementById('respuesta').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('respuesta').style.border="4px solid #4dd599";
	}
	if(nombre_cargo == 0){
		document.getElementById('nombre_cargo').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('nombre_cargo').style.border="4px solid #4dd599";
	}

	return true;

}