<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mascotas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('administradores_model');
		$this->load->model('usuarios_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function index()
	{
		$data['resultado'] = TRUE;

		$name = $this->input->post('nombre');
		
		if (!$name) {
			$name = '';
		}

		$query = $this->administradores_model->buscar_mascotas($name);

		if ($query) {
			$num = 0;

			foreach ($query as $key) {
				$data['mascota'][$num] = array(
					'id' => $key->mas_id,
					'nombre'=> $key->mas_nombre,
					'size'=> $key->mas_size,
					'raza'=> $key->mas_raza,
					'genero'=> $key->mas_genero,
					'color'=> $key->mas_color,
					'edad'=> $key->mas_edad,
					'hora_comida'=> $key->mas_hora_comida,
					'esterilizado'=> $key->mas_esterilizado,
					'agresivo'=> $key->mas_agresivo,
					'medicamento'=> $key->mas_medicamento,
					'observaciones'=> $key->mas_observaciones,
					'us_id' => $key->us_id,
					'nombre_dueño' => $key->us_nombre,
					'paterno' => $key->us_ap_paterno,
					'materno' =>$key->us_ap_materno
				);
				$num++;
			}
		}else{
			$data['resultado'] = FALSE;
		}

		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/mascotas/buscar',$data);
		$this->load->view('administrador/layers/footer');
	}

}

/* End of file mascotas.php */
/* Location: ./application/controllers/mascotas.php */