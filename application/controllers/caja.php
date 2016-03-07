<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caja extends CI_Controller {

	public function index()
	{
		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/caja/tabla');
		$this->load->view('administrador/layers/footer');
	}

}

/* End of file caja.php */
/* Location: ./application/controllers/caja.php */