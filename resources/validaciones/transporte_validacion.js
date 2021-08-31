
console.log('ffff');
function validarTrans(){

	var placa = document.getElementById('placa').value;
	var modelo = document.getElementById('modelo').value;
	var marca = document.getElementById('marca').value;
	var capacidad = document.getElementById('capacidad').value;
	var nombre_empleado = document.getElementById('nombre_empleado').selectedIndex;
	var nombre_estadoT = document.getElementById('nombre_estadoT').selectedIndex;

	if(placa.length == 0){
		document.getElementById('placa').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('placa').style.border="4px solid #4dd599";
	}
	if(modelo.length == 0){
		document.getElementById('modelo').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('modelo').style.border="4px solid #4dd599";
	}
	if(marca.length == 0){
		document.getElementById('marca').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('marca').style.border="4px solid #4dd599";
	}
	if(capacidad.length == 0){
		document.getElementById('capacidad').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('capacidad').style.border="4px solid #4dd599";
	}
	if(nombre_empleado == 0){
		document.getElementById('nombre_empleado').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('nombre_empleado').style.border="4px solid #4dd599";
	}
	if(nombre_estadoT == 0){
		document.getElementById('nombre_estadoT').style.border="4px solid #f67280";
		return false;
	}else{
		document.getElementById('nombre_estadoT').style.border="4px solid #4dd599";
	}

	return true;
}//end 