<?php
$proceso = if(isset($_FILES["file"]["type"])){
	$validextensions = array("jpeg", "jpg", "png");
	$temporal = explode(".", $_FILES["file"]["name"]);
	$extension = end($temporal);
	$limite_kb= 600;
	if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && ($_FILES["file"]["size"]  < $limite_kb * 1024) && in_array($extension, $validextensions)){
		if ($_FILES["file"]["error"] > 0){
			echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
		}else{
			if (file_exists("upload/" . $_FILES["file"]["name"])){
				echo $_FILES["file"]["name"] . " <span id='invalid'><b>Archivo ya existe.</b></span> ";
			}else{
				$origen = $_FILES['file']['tmp_name']; //Almacenar la ruta de origen del archivo en una variable
				$destino = "upload/".$_FILES['file']['name']; //Ruta de destino donde se almacenará el archivo
				move_uploaded_file($origen,$destino) ; //Mover archivo cargado
				echo "<span id='success'>Imagen subida satisfactoriamente...!!</span><br/>";
			}
		}
	}else{
		echo "<span id='invalid'>***Invalid file Size or Type***<span>";
	}
	
}
?>