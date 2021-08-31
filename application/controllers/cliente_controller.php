<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class cliente_controller extends CI_Controller{


	public function __construct(){

		parent:: __construct();
		$this->load->model('cliente_model');	
	}
	public function index(){
		$data = array('title'=> 'Clientes');
		$this->load->view('template/head',$data);
		$this->load->view('template/menu_admin');//
		$this->load->view('cliente_view');
		$this->load->view('template/footer');

	}
	public function get_cliente(){
		$respuesta = $this->cliente_model->get_cliente();
		echo json_encode($respuesta);	
	}
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->cliente_model->eliminar($id);
		echo json_encode($respuesta);	
	}
	public function ingresar(){
		$datos['nombre_cliente'] = $this->input->post('nombre_cliente');	
		$datos['apellido_cliente'] = $this->input->post('apellido_cliente');	
		$datos['DUI'] = $this->input->post('DUI');	
		$datos['fecha_nac'] = $this->input->post('fecha_nac');	
		$datos['direccion'] = $this->input->post('direccion');	
		$datos['correo'] = $this->input->post('correo');	
		$datos['telefono'] = $this->input->post('telefono');
		$respuesta = $this->cliente_model->set_clientes($datos);
		echo json_encode($respuesta);	
	}
	public function get_datos(){
		$id = $this->input->post('id');	
		$respuesta = $this->cliente_model->get_datos($id);
		echo json_encode($respuesta);
	}
	public function actualizar(){
		$datos['id_cliente'] = $this->input->post('id_cliente');
		$datos['nombre_cliente'] = $this->input->post('nombre_cliente');
		$datos['apellido_cliente'] = $this->input->post('apellido_cliente');
		$datos['DUI'] = $this->input->post('DUI');
		$datos['fecha_nac'] = $this->input->post('fecha_nac');
		$datos['direccion'] = $this->input->post('direccion');
		$datos['correo'] = $this->input->post('correo');
		$datos['telefono'] = $this->input->post('telefono');
		$respuesta = $this->cliente_model->actualizar($datos);
		echo json_encode($respuesta);
	}


	public function validarNombre(){
		$nombre_cliente = $this->input->post('nombre_cliente');
		$res = $this->alumnoModel->validarNombre($nombre_cliente);
		echo json_encode($res);
	}

}

?>