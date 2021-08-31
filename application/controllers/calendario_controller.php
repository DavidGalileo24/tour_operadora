<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class calendario_controller extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('calendario_model');
	}

	public function index(){
		$data = array('title' => 'Calendario');
		$this->load->view('template/head',$data);
		$this->load->view('template/menu_admin');
		$this->load->view('calendario_view');
		$this->load->view('template/footer');
	}

}
?>