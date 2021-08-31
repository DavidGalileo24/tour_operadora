<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reserva_controller extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('reserva_model');
	}

	public function index(){
		$data = array('title' => 'Reservas');
		$this->load->view('template/head',$data);
		$this->load->view('template/menu_admin');
		$this->load->view('reserva_view');
		$this->load->view('template/footer');
	}
	public function leer(){
		$respuesta = $this->reserva_model->leer();
		echo json_encode($respuesta);
	}
	public function empleado(){
		$respuesta = $this->reserva_model->llenarempleado();
		echo json_encode($respuesta);
	}
	public function destino(){
		$respuesta = $this->reserva_model->llenardestino();
		echo json_encode($respuesta);
	}

	public function cliente(){
		$respuesta = $this->reserva_model->llenarcliente();
		echo json_encode($respuesta);
	}
	public function estado(){
		$respuesta = $this->reserva_model->llenarestado();
		echo json_encode($respuesta);
	}
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->reserva_model->eliminar($id);
		echo json_encode($respuesta);
	}

	public function insertar(){
		$datos['fecha_reserva'] = $this->input->post('fecha_reserva');
		$datos['nombre_empleado'] = $this->input->post('nombre_empleado');
		$datos['nombre_destino'] = $this->input->post('nombre_destino');
		//$datos['fecha_salida'] = $this->input->post('fecha_salida');
		$datos['nombre_cliente'] = $this->input->post('nombre_cliente');
		$datos['n_adultos'] = $this->input->post('n_adultos');
		$datos['n_ninos'] = $this->input->post('n_ninos');
		$datos['total_pagar'] = $this->input->post('total_pagar');
		$datos['abono'] = $this->input->post('abono');
		$datos['residuo'] = $this->input->post('residuo');
		$datos['nombre_estado'] = $this->input->post('nombre_estado');

		$respuesta = $this->reserva_model->insertar($datos);
		echo json_encode($respuesta);
	}

	public function cargarID(){
		$id = $this->input->post('id');
		$respuesta = $this->reserva_model->cargarID($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){
		$datos['id_reservacion'] = $this->input->post('id_reservacion');
		$datos['fecha_reserva'] = $this->input->post('fecha_reserva');
		$datos['nombre_empleado'] = $this->input->post('nombre_empleado');
		$datos['nombre_destino'] = $this->input->post('nombre_destino');
		//$datos['fecha_salida'] = $this->input->post('fecha_salida');
		$datos['nombre_cliente'] = $this->input->post('nombre_cliente');
		$datos['n_adultos'] = $this->input->post('n_adultos');
		$datos['n_ninos'] = $this->input->post('n_ninos');
		$datos['total_pagar'] = $this->input->post('total_pagar');
		$datos['abono'] = $this->input->post('abono');
		$datos['residuo'] = $this->input->post('residuo');
		$datos['nombre_estado'] = $this->input->post('nombre_estado');

		$respuesta = $this->reserva_model->actualizar($datos);

		echo json_encode($respuesta);
	}
	public function validarNombre(){
		$nombre_cliente = $this->input->post('nombre_cliente');
		$res = $this->alumnoModel->validarNombre($nombre_cliente);
		echo json_encode($res);
	}
}