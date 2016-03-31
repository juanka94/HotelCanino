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

		header('Location: http://localhost/HotelCanino/index.php/habitaciones/');
	}

	public function buscar_usuario()
	{
		$data['resultado'] = TRUE;

		$name = $this->input->post('nombre');

		if (!$name) {
			$name = '';
		}

		$data['usuarios'] = $this->administradores_model->usuarios($name);

		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/reservaciones/buscar_usuario',$data);
		$this->load->view('administrador/layers/footer');
	}

	public function crear_cliente()
	{
		if(!$this->session->userdata('logged_user')){
			redirect('administradores/login');
		}else{
		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/reservaciones/crear_cliente');
		$this->load->view('administrador/layers/footer');
		}
	}

	public function add_cliente()
	{
		if(!empty($_POST)) {
			$insert = array(
				'us_nombre'=> $this->input->post('nom_usuario'),
				'us_ap_paterno'=> $this->input->post('ap_paterno'),
				'us_ap_materno'=> $this->input->post('ap_materno'),
				'us_tel_casa'=> $this->input->post('tel_casa'),
				'us_tel_cel'=> $this->input->post('tel_celular'),
				'us_email'=> $this->input->post('email'),
				'us_password'=> $this->input->post('password'),
				'us_dom_calle'=> $this->input->post('dom_calle'),
				'us_dom_localidad'=> $this->input->post('localidad'),
				'us_dom_municipio'=> $this->input->post('municipio'),
				'us_dom_estado'=> $this->input->post('estado')
				
				);
		}
		
		$this->administradores_model->insertar_cliente($insert);

		$query = $this->administradores_model->last_user();
		
		foreach ($query as $key) {
			$data['us_id'] = $key;
		}

		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/reservaciones/form_mascota',$data);
		$this->load->view('administrador/layers/footer');
	}

	public function agregar_mascota()
	{
		$insert = array(
			'mas_nombre' => $this->input->post('nombre'),
			'mas_size' => $this->input->post('tamaño'),
			'mas_genero' => $this->input->post('sexo'),
			'mas_color' => $this->input->post('color'),
			'mas_edad' => $this->input->post('edad'),
			'mas_hora_comida' => $this->input->post('comida'),
			'mas_esterilizado' => $this->input->post('esterlilizado'),
			'mas_agresivo' => $this->input->post('agresivo'),
			'mas_medicamento' => $this->input->post('medicamento'),
			'mas_observaciones' => $this->input->post('observaciones'),
			'mas_id_usuario' => $this->input->post('us_id')
		);

		$this->administradores_model->insertar_mascota($insert);

		$query = $this->administradores_model->last_mascota();

		foreach ($query as $key) {
			$mascota['mas_res_id_mas'] = $key->mas_id;
		}

		$usuario = $insert['mas_id_usuario'];

		$insert2 = array(
			'res_fecha_in' => $this->input->post('fecha_in'),
			'res_fecha_out' => $this->input->post('fecha_out'),
			'res_status' => 0,
			'res_no_habitacion' => 0,
			'res_id_usuario' => $usuario
		);		

		$this->administradores_model->insertar_reservacion($insert2);

		$query = $this->administradores_model->last_reservacion();

		foreach ($query as $key) {
			$mascota['mas_res_id_res'] = $key->res_id;
		}

		$this->administradores_model->insertar_mascotas_reservaciones($mascota);

		redirect('/administradores','refresh');
	}

	public function form_reservacion()
	{
		$data['us_id'] = $this->uri->segment(3);

		$query = $this->administradores_model->mas_id_usuario($data['us_id']);

		$id_mascota = array();
		if ($query) {
			foreach ($query as $key => $value) {
			$id_mascota[] = $value->mas_id;
			}
			$query = $this->administradores_model->res_mascota($id_mascota);
		}
		

		$num = 0;
		if ($query) {
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
				'observaciones'=> $key->mas_observaciones,);
			$num++;
			}

			$this->load->view('administrador/layers/header');
			$this->load->view('administrador/layers/menu');
			$this->load->view('administrador/reservaciones/form_reservacion',$data);
			$this->load->view('administrador/layers/footer');
		}else{
			$data['us_id'] = $this->uri->segment(3);
			$data['mensaje']="Este usuario no cuenta con un perro, favor de agregar uno para la reservacion";
			$this->load->view('administrador/layers/header');
			$this->load->view('administrador/layers/menu');
			$this->load->view('administrador/usuario/form_mascota',$data);
			$this->load->view('administrador/layers/footer');
		}
		

		
	}

	public function agregar_reservacion()
	{
		$insert = array(
			'res_fecha_in' => $this->input->post('fecha_in'),
			'res_fecha_out' => $this->input->post('fecha_out'),
			'res_status' => 0,
			'res_no_habitacion' => 0,
			'res_id_usuario' => $this->input->post('us_id')
		);

		$this->administradores_model->insertar_reservacion($insert);

		$query = $this->administradores_model->last_reservacion();

		foreach ($query as $key) {
			$data['mas_res_id_res'] = $key->res_id;
		}

		for ($i=0; $i < 3; $i++) { 

			$data['mas_res_id_mas'] = $this->input->post('mascota'.$i);

			if ($data['mas_res_id_mas']) {
				$this->administradores_model->insertar_mascotas_reservaciones($data);
			}
		}

		redirect('/administradores','refresh');

	}
}

/* End of file reservaciones */
/* Location: ./application/controllers/reservaciones */