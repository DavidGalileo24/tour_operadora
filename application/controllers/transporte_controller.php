<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transporte_controller extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('transporte_model');
	}
	public function index(){
		$data = array('title' => 'Transporte');
		$this->load->view('template/head', $data);
		$this->load->view('template/menu_admin');
		$this->load->view('transporte_view');
		$this->load->view('template/footer');

	}
	public function get_transporte(){
		$respuesta = $this->transporte_model->get_transporte();
		echo json_encode($respuesta);
	}
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->transporte_model->eliminar($id);
		echo json_encode($respuesta);
	}

	public function ingresar(){
		$datos['nombre_empleado'] = $this->input->post('nombre_empleado');
		$datos['placa'] = $this->input->post('placa');
		$datos['modelo'] = $this->input->post('modelo');
		$datos['marca'] = $this->input->post('marca');
		$datos['capacidad'] = $this->input->post('capacidad');
		$datos['nombre_estadoT'] = $this->input->post('nombre_estadoT');
		$respuesta = $this->transporte_model->set_transporte($datos);
		echo json_encode($respuesta);
	}





	public function get_empleado(){
		$respuesta = $this->transporte_model->get_empleado();
		echo json_encode($respuesta);
	

	}
	public function get_estadoT(){
		$respuesta = $this->transporte_model->get_estadoT();
		echo json_encode($respuesta);

	
	}
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->transporte_model->get_datos($id);
		echo json_encode($respuesta);
	}
	public function actualizar(){

		$datos['id_transporte']    = $this->input->post('id_transporte');
		$datos['nombre_empleado']       = $this->input->post('nombre_empleado');
		
		$datos['marca']         = $this->input->post('marca');
		$datos['modelo']       = $this->input->post('modelo');
		$datos['placa']         = $this->input->post('placa');
		$datos['capacidad']      = $this->input->post('capacidad');
		$datos['nombre_estadoT']       = $this->input->post('nombre_estadoT');
		

		$respuesta = $this->transporte_model->actualizar($datos);

		echo json_encode($respuesta);

	}




}