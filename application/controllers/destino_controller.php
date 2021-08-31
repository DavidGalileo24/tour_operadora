<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class destino_controller extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->model('destino_model');
	}
//-------------------------------cargando en el index el template--------------------------------------------//
	public function index(){
		$data = array('title' => 'Destinos');
		$this->load->view('template/head',$data);

		$this->load->view('template/menu_admin');
		$this->load->view('destino_view');
		$this->load->view('template/footer');
	}
//-------------------------------function mostrar datos de la db--------------------------------------------//
	public function mostrar_destino(){
		$respuesta = $this->destino_model->get_destino();
		echo json_encode($respuesta);
	}
//-------------------------------fin function mostrar datos de la db----------------------------------------//
	public function eliminarD(){
		$id = $this->input->post('id');
		$respuesta = $this->destino_model->eliminar($id);
		echo json_encode($respuesta);
	}
//-------------------------------function ingresar datos de la db-------------------------------------------//
	public function ingresar_destino(){
		
		$datos['nombre_destino'] = $this->input->post('nombre_destino');
		$datos['categoria'] = $this->input->post('categoria');
		$datos['descripcion'] = $this->input->post('descripcion');
		$datos['departamento'] = $this->input->post('departamento');
		$datos['direccion'] = $this->input->post('direccion');

		$respuesta = $this->destino_model->set_destino($datos);
		echo json_encode($datos);
	}
//-------------------------------fin function mostrar datos de la db----------------------------------------//

//-------------------------------function mostrar datos de la db de los select------------------------------//
	public function select_categoria(){
		$respuesta = $this->destino_model->get_categoria();
		echo json_encode($respuesta);
	}
	public function select_departamento(){
		$respuesta = $this->destino_model->get_departamento();
		echo json_encode($respuesta);
	}
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->destino_model->get_datos($id);
		echo json_encode($respuesta);
	}
//-------------------------------fin function mostrar datos de la db de los select--------------------------//
	public function actualizar(){
		$datos['id_destino'] = $this->input->post('id_destino');
		$datos['nombre_destino'] = $this->input->post('nombre_destino');
		$datos['categoria'] = $this->input->post('categoria');
		$datos['descripcion'] = $this->input->post('descripcion');

		$datos['departamento'] = $this->input->post('departamento');
		$datos['direccion'] = $this->input->post('direccion');

		$respuesta = $this->destino_model->actualizar($datos);
		echo json_encode($respuesta);
	}
}