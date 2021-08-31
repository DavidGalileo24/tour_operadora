
console.log('Waaaaa');
function validarReserva(){

	var fecha_reserva = document.getElementById('fecha_reserva').value;
	var nombre_empleado = document.getElementById('nombre_empleado').selectedIndex;
	var nombre_destino = document.getElementById('nombre_destino').selectedIndex;
	//var fecha_salida = document.getElementById('fecha_salida').value;
	var nombre_cliente = document.getElementById('nombre_cliente').selectedIndex;
	var n_adultos = document.getElementById('n_adultos').value;
	var n_ninos = document.getElementById('n_ninos').value;
	var total_pagar = document.getElementById('total_pagar').value;
	var abono = document.getElementById('abono').value;
	var residuo = document.getElementById('residuo').value;
	var nombre_estado = document.getElementById('nombre_estado').selectedIndex;

	if(fecha_reserva == 0){
		document.getElementById('fecha_reserva').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('fecha_reserva').style.border="4px solid #4dd599";
	}
	if(nombre_empleado == 0){
		document.getElementById('nombre_empleado').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('nombre_empleado').style.border="4px solid #4dd599";
	}

	if(nombre_destino == 0){
		document.getElementById('nombre_destino').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('nombre_destino').style.border="4px solid #4dd599";
	}
	/*
	if(fecha_salida == 0){
		document.getElementById('fecha_salida').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('fecha_salida').style.border="4px solid #4dd599";
	}
	*/

	if(nombre_cliente == 0){
		document.getElementById('nombre_cliente').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('nombre_cliente').style.border="4px solid #4dd599";
	}
	if(n_adultos.length == 0 || n_adultos >= 10){
		document.getElementById('n_adultos').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('n_adultos').style.border="4px solid #4dd599";
	}
	if(n_ninos.length == 0 || n_ninos >= 10){
		document.getElementById('n_ninos').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('n_ninos').style.border="4px solid #4dd599";
	}
	if(total_pagar.length == 0){
		document.getElementById('total_pagar').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('total_pagar').style.border="4px solid #4dd599";
	}
	if(abono.length == n_adultos > 5){
		document.getElementById('abono').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('abono').style.border="4px solid #4dd599";
	}
	if(residuo.length == 0){
		document.getElementById('residuo').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('residuo').style.border="4px solid #4dd599";
	}
	if(nombre_estado == 0){
		document.getElementById('nombre_estado').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('nombre_estado').style.border="4px solid #4dd599";
	}



	return true;
}