<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class registroReservaC extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->model('registroReservaM');
	}

	public function index(){
		$data = array('title' => 'Seguimiento de reserva' );
		$this->load->view('template/head',$data);
		$this->load->view('template/menu_admin');
		$this->load->view('registroReservaV');
		$this->load->view('template/footer');
	}

	public function readDatos(){
		$respuesta = $this->registroReservaM->readDatos();
		echo json_encode($respuesta);
	}
}