<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caja extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->model('caja_model');
	}

	public function index()
	{
		$data['caja'] = $this->caja_model->obtener_caja();
		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/caja/tabla',$data);
		$this->load->view('administrador/layers/footer');
	}

	public function entradas_salidas()
	{
		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/caja/form_entrada');
		$this->load->view('administrador/layers/footer');
	}


	public function insertar_caja()
	{
		if(!empty($_POST)) {
			$data = array(
				'caja_nombre'=> $this->input->post('nom_entrada'),
				'caja_monto'=> $this->input->post('efectivo_entrada'),
				'caja_tipo'=> $this->input->post('tipo_entrada')
				);
		}
		if($this->caja_model->insertar_caja($data))
		redirect('caja/index');
		
	}

}

/* End of file caja.php */
/* Location: ./application/controllers/caja.php */