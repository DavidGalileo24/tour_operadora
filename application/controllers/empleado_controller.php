<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class empleado_controller extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('empleado_model');
	}

	public function index(){
		$data = array('title' => 'Empleados YT');
		$this->load->view('template/head',$data);
		$this->load->view('template/menu_admin');
		$this->load->view('empleado_view');
		$this->load->view('template/footer');
	}

        public function get_empleado(){
		$respuesta = $this->empleado_model->get_empleado();
		echo json_encode($respuesta);
	}

	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->empleado_model->eliminar($id);
		echo json_encode($respuesta);
	}

	public function get_licencia(){
		$respuesta = $this->empleado_model->get_licencia();
		echo json_encode($respuesta);
	}

	public function get_cargo(){
		$respuesta = $this->empleado_model->get_cargo();
		echo json_encode($respuesta);
	}

	public function ingresar(){
		$datos['DUI'] = $this->input->post('DUI');
		$datos['nombre_empleado'] = $this->input->post('nombre_empleado');
		$datos['apellido_empleado'] = $this->input->post('apellido_empleado');
		$datos['fecha_nac'] = $this->input->post('fecha_nac');
		$datos['direccion'] = $this->input->post('direccion');
		$datos['correo'] = $this->input->post('correo');
		$datos['telefono'] = $this->input->post('telefono');
		$datos['respuesta'] = $this->input->post('respuesta');
		$datos['nombre_cargo'] = $this->input->post('nombre_cargo');

		$respuesta = $this->empleado_model->set_empleado($datos);
		echo json_encode($respuesta);
	}

		public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->empleado_model->get_datos($id);
		echo json_encode($respuesta);
	}

		public function actualizar(){
	    $datos['id_empleado']         = $this->input->post('id_empleado');
		$datos['DUI']                 = $this->input->post('DUI');
		$datos['nombre_empleado']     = $this->input->post('nombre_empleado');
		$datos['apellido_empleado']   = $this->input->post('apellido_empleado');
		$datos['fecha_nac']           = $this->input->post('fecha_nac');
		$datos['direccion']           = $this->input->post('direccion');
		$datos['correo']              = $this->input->post('correo');
		$datos['telefono']            = $this->input->post('telefono');
		$datos['respuesta']           = $this->input->post('respuesta');
		$datos['nombre_cargo']        = $this->input->post('nombre_cargo');

		$respuesta = $this->empleado_model->actualizar($datos);
		echo json_encode($respuesta);
	}



	public function ajaxDUI(){
		$respuesta = $this->empleado_model->ajaxDUI();
		echo json_encode($respuesta);
	}
}