<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservaciones extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('administradores_model');
		$this->load->model('usuarios_model');
		$this->load->library('form_validation');
	}

	public function lugar()
	{
		$data['segmento'] = $this->uri->segment(3);

		$query =  $this->administradores_model->reservacion($data['segmento']);

		foreach ($query as $key) {
			$fecha_in = $key->res_fecha_in;
			$fecha_out = $key->res_fecha_out;
		}

		$data['lugares'] = $this->administradores_model->lugar_disponible($fecha_in,$fecha_out);

		if ($data['lugares']) {
			$data['disponible'] = TRUE;
		}
		else{
			$data['disponible'] = FALSE;
		}

		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/reservaciones/lugares',$data);
		$this->load->view('administrador/layers/footer');	
	}
//NUEVO INICIO
	public function form_res()
	{
		$data['num_res'] = $this->uri->segment(3);

		$query = $this->administradores_model->reservacion($data['num_res']);

		foreach ($query as $key) {
			$data['reservacion'] = array(
				'id' => $key->res_id,
				'fecha_in'=> $key->res_fecha_in,
				'fecha_out'=> $key->res_fecha_out
			);
			$id = $key->res_id_usuario;
		}

		$query = $this->administradores_model->res_usuario($id);

		foreach ($query as $key) {
			$data['usuario'] = array(
				'id' => $key->us_id,
				'nombre'=> $key->us_nombre,
				'paterno'=> $key->us_ap_paterno,
				'materno'=> $key->us_ap_materno,
				'correo' => $key->us_email,
				'casa'=> $key->us_tel_casa,
				'cel'=> $key->us_tel_cel,
				'calle'=> $key->us_dom_calle,
				'localidad'=> $key->us_dom_localidad,
				'municipio'=> $key->us_dom_municipio,
				'estado'=> $key->us_dom_estado
			);
		}

		$query = $this->administradores_model->res_id_mascota($data['reservacion']['id']);

		$id_mascota = array();

		foreach ($query as $key => $value) {
			$id_mascota[] = $value->mas_res_id_mas;
		}

		$query = $this->administradores_model->res_mascota($id_mascota);

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
			);
			$num++;
		}

		$data['num_habitacion'] = $this->uri->segment(4);

		$data['sencillo'] = FALSE;
		$data['redondo'] = FALSE;

		$data['ser_domi'] = $this->administradores_model->mostrar_ser_dom_sen($data['num_res']);

		if ($data['ser_domi']) {
			$data['sencillo'] = TRUE;
		}
		else{
			$data['ser_domi'] = $this->administradores_model-> mostrar_ser_redondo($data['num_res']);
			if ($data['ser_domi']) {
				$data['redondo'] = TRUE;
			}
		}

		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/reservaciones/formulario',$data);
		$this->load->view('administrador/layers/footer');
	}
//NUEVO FIN
	public function validar_res($value='')
	{
		$data['res_temporada'] = $this->input->post('temporada');
		$data['res_no_habitacion'] = $this->input->post('num_habitacion');
		$data['res_id'] = $this->input->post('res_id');
		$data['res_status'] = 1;

		$this->administradores_model->activar($data);

		header('Location: http://localhost/hotelcaninoreyes/index.php/habitaciones/');
	}
}

/* End of file reservasiones */
/* Location: ./application/controllers/reservasiones */