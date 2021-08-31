<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class correo_controller extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		//Cargamos el archivo modelo
		$this->load->model('correo_model');
	}

	public function index(){
		//Recibimos el correo enviado desde el formulario
		$data['email'] = $_POST['correo'];
		//Enviamos el correo al metodo del modelo para validar si este existe en la BD
		$data['usuario'] = $this->correo_model->validarcorreo($data);
		//Si el metodo nos devuelve TRUE se intentara enviar el correo
		if ($data['usuario'] == false) {
			//Si el metodo validarcorreo nos devuelve FALSE es porque el correo no existe
			//Cargamos el metodo error para que nos muestre la alerta correspondiente
			redirect('/login_controller/correo/errorCorreo','refresh');
		}else{
			$this->load->view('phpmailer/correo_view',$data);
		}	
	}

}