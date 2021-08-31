<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()	{
		$data = array('title' => 'Yorozuya -- Tours' );
		$this->load->view('template/head',$data);
		$this->load->view('template/menu');
		$this->load->view('welcome_message');
		$this->load->view('template/footer');
	}
}
