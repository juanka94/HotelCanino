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

		$result_estado=$this->caja_model->verificar_estado();

		if(!$result_estado){
			$this->load->view('administrador/layers/header');
			$this->load->view('administrador/layers/menu');
			$this->load->view('administrador/caja/inicio_caja');
			$this->load->view('administrador/layers/footer');
			
		}else{
			foreach ($result_estado as $key) {
					$id=$key->caja_total_id;	
			}

			$data['caja'] = $this->caja_model->obtener_caja($id);
			$this->load->view('administrador/layers/header');
			$this->load->view('administrador/layers/menu');
			$this->load->view('administrador/caja/tabla',$data);
			$this->load->view('administrador/layers/footer');
			
		}
	}

	public function inicio_caja()
	{
		if(!empty($_POST)) {
			$data = array(
				'caja_total_fecha'=> $this->input->post('fech_in'),
				'caja_total_inicio'=> $this->input->post('monto_inicial'),
				'caja_total_total'=> 0,
				'caja_total_estado'=> 1 //activa 0 inactiva
				
				);
		}
		if($this->caja_model->inicio_caja($data))
		redirect('caja/index');
	}


	public function entradas_salidas()
	{
		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/caja/form_entrada_salida');
		$this->load->view('administrador/layers/footer');
	}

	public function insertar_caja()
	{
		$id_result_estado=$this->caja_model->verificar_estado();
		foreach ($id_result_estado as $key) {
					$id=$key->caja_total_id;
		}

		if(!empty($_POST)) {
			$data = array(
				'caja_datos_nombre'=> $this->input->post('nom_entrada'),
				'caja_datos_monto'=> $this->input->post('efectivo_entrada'),
				'caja_datos_tipo'=> $this->input->post('tipo_entrada'),
				'caja_total_id'=>$id
				);
		}
		if($this->caja_model->insertar_caja($data))
		redirect('caja/index');
		
	}

	

}

/* End of file caja.php */
/* Location: ./application/controllers/caja.php */