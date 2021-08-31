<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inicio_controller extends CI_Controller {

	
	public function index()	{
		$data = array('title' => 'Inicio' );
		$this->load->view('template/head',$data);
		$this->load->view('template/menu_admin');
		$this->load->view('inicio_view');
		$this->load->view('template/footer');
	}
}
