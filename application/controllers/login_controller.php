<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_controller extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('login_model');
	}
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	public function index(){
		$data = array('title' => 'Inicio de Sesión');
		$this->load->view('template/head',$data);
		$this->load->view('login_view');
		$this->load->view('template/footer');
	}
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	public function iniciar(){
		$datos['usuario'] = $this->input->post('usuario');
		$datos['clave'] = md5($this->input->post('pass'));
		$data = $this->login_model->validar($datos);
		if($data){
			//variables de sesion
			$datos_usuario = array('id' => $data->id_empleado, 'usuario'=> $data->usuario, 'logueado' => TRUE);
			$this->session->set_userdata($datos_usuario);
			redirect('/inicio_controller/','refresh');
		}else{
			$data['msj'] = "Error";
			$this->load->view('login_view',$data);

		}
	}
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	public function cerrar(){
		$user_data = array('Logueado' => FALSE);
		$this->session->set_userdata($user_data);
		$this->session->sess_destroy();
		redirect('login_controller/index','refresh');
	}
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	public function correo($msj){
		
		if ($msj == "errorCorreo") {
			$data['msj'] = "errorCorreo";
		}elseif ($msj == "okCorreo") {
			$data['msj'] = "okCorreo";
		}else{
			$data['msj'] = "errorEnviar";
		}
		
		$this->load->view('login_view',$data);
	}
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	public function cambiar_clave(){
		$datos['actual']    = md5($this->input->post('cActual'));
		$datos['nueva']     = md5($this->input->post('cNueva'));
		$res = $this->login_model->cambiar_clave($datos);
		echo json_encode($res);
	}
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------//
}