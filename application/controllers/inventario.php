<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('administradores_model');
		$this->load->model('usuarios_model');
		$this->load->library('form_validation');
	}

	public function index()
	{

		$data['resultado'] = TRUE;

		$name = $this->input->post('nombre');
		
		if (!$name) {
			$name = '';
		}

		$tabla = $this->input->post('tabla');

		if (!$tabla) {
			$tabla = 0;
		}

		switch ($tabla) {
			case 1:
				$data['servicios'] = $this->administradores_model->servicios($name);
				$data['productos'] = array();
				$data['paquetes'] = array();

				if (!$data['servicios']) {
					$data['resultado'] = FALSE;
				}
				break;
			
			case 2:
				$data['productos'] = $this->administradores_model->productos($name);
				$data['servicios'] = array();
				$data['paquetes'] = array();

				if (!$data['productos']) {
					$data['resultado'] = FALSE;
				}
				break;

			case 3:
				$data['paquetes'] = $this->administradores_model->paquetes($name);
				$data['productos'] = array();
				$data['servicios'] = array();

				if (!$data['paquetes']) {
					$data['resultado'] = FALSE;
				}
				break;

			default:
				$data['productos'] = $this->administradores_model->productos($name);
				$data['servicios'] = $this->administradores_model->servicios($name);
				$data['paquetes'] = $this->administradores_model->paquetes($name);

				if (!$data['paquetes'] && !$data['servicios'] && !$data['productos']) {
					$data['resultado'] = FALSE;
				}
				break;
		}

		

		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/inventario/tablas',$data);
		$this->load->view('administrador/layers/footer');
	}

	public function cantidad_producto()
	{
		$data['prod_id'] = $this->uri->segment(3);
		$data['prod_cantidad'] = $this->uri->segment(4) + 1;

		$this->administradores_model->cantidad_producto($data);

		header('Location: http://localhost/hotelcaninoreyes/index.php/inventario');
	}

	public function form_producto()
	{
		$prod_id = $this->uri->segment(3);

		$query = $this->administradores_model->producto($prod_id);

		foreach ($query as $key) {
			$data['producto'] = array(
				'id' => $key->prod_id,
				'nombre'=> $key->prod_nombre,
				'precio'=> $key->prod_precio,
				'cantidad'=> $key->prod_cantidad,
				'descripcion'=> $key->prod_descripcion
			);
		}
		
		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/inventario/form_producto',$data);
		$this->load->view('administrador/layers/footer');
	}

	public function modificar_producto()
	{
		$prod_id = $this->input->post('id');
		$data['prod_nombre'] = $this->input->post('nombre');
		$data['prod_precio'] = $this->input->post('precio');
		$data['prod_cantidad'] = $this->input->post('cantidad');
		$data['prod_descripcion'] = $this->input->post('descripcion');

		$this->administradores_model->modificar_producto($prod_id, $data);

		header('Location: http://localhost/hotelcaninoreyes/index.php/inventario');
	}

	public function eliminar_producto()
	{
		$data['prod_id'] = $this->uri->segment(3);

		$this->administradores_model->eliminar_producto($data);

		header('Location: http://localhost/hotelcaninoreyes/index.php/inventario');
	}

	public function form_servicio()
	{
		$serv_id = $this->uri->segment(3);

		$query = $this->administradores_model->servicio($serv_id);

		foreach ($query as $key) {
			$data['servicio'] = array(
				'id' => $key->serv_id,
				'nombre'=> $key->serv_nombre,
				'precio'=> $key->serv_precio,
				'descripcion'=> $key->serv_descripcion
			);
		}
		
		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/inventario/form_servicio',$data);
		$this->load->view('administrador/layers/footer');
	}

	public function modificar_servicio()
	{
		$serv_id = $this->input->post('id');
		$data['serv_nombre'] = $this->input->post('nombre');
		$data['serv_precio'] = $this->input->post('precio');
		$data['serv_descripcion'] = $this->input->post('descripcion');

		$this->administradores_model->modificar_servicio($serv_id, $data);

		header('Location: http://localhost/hotelcaninoreyes/index.php/inventario');
	}

	public function eliminar_servicio()
	{
		$data['serv_id'] = $this->uri->segment(3);

		$this->administradores_model->eliminar_servicio($data);

		header('Location: http://localhost/hotelcaninoreyes/index.php/inventario');
	}

	public function form_paquete()
	{
		$paque_id = $this->uri->segment(3);

		$query = $this->administradores_model->paquete($paque_id);

		foreach ($query as $key) {
			$data['paquete'] = array(
				'id' => $key->paque_id,
				'nombre'=> $key->paque_nombre,
				'precio'=> $key->paque_precio,
				'descripcion'=> $key->paque_descripcion
			);
		}
		
		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/inventario/form_paquete',$data);
		$this->load->view('administrador/layers/footer');
	}

	public function modificar_paquete()
	{
		$paque_id = $this->input->post('id');
		$data['paque_nombre'] = $this->input->post('nombre');
		$data['paque_precio'] = $this->input->post('precio');
		$data['paque_descripcion'] = $this->input->post('descripcion');

		$this->administradores_model->modificar_paquete($paque_id, $data);

		header('Location: http://localhost/hotelcaninoreyes/index.php/inventario');
	}

	public function eliminar_paquete()
	{
		$data['paque_id'] = $this->uri->segment(3);

		$this->administradores_model->eliminar_paquete($data);

		header('Location: http://localhost/hotelcaninoreyes/index.php/inventario');
	}

	public function form_agregar()
	{
		$data['tabla'] = $this->input->post('tabla2');

		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/inventario/form_agregar',$data);
		$this->load->view('administrador/layers/footer');
	}

	public function add_producto()
	{
		$data['prod_nombre'] = $this->input->post('nombre');
		$data['prod_precio'] = $this->input->post('precio');
		$data['prod_cantidad'] = $this->input->post('cantidad');
		$data['prod_descripcion'] = $this->input->post('descripcion');

		$this->administradores_model->add_producto($data);

		header('Location: http://localhost/hotelcaninoreyes/index.php/inventario');
	}

	public function add_servicio()
	{
		$data['serv_nombre'] = $this->input->post('nombre');
		$data['serv_precio'] = $this->input->post('precio');
		$data['serv_descripcion'] = $this->input->post('descripcion');

		$this->administradores_model->add_servicio($data);

		header('Location: http://localhost/hotelcaninoreyes/index.php/inventario');
	}

		public function add_paquete()
	{
		$data['paque_nombre'] = $this->input->post('nombre');
		$data['paque_precio'] = $this->input->post('precio');
		$data['paque_descripcion'] = $this->input->post('descripcion');

		$this->administradores_model->add_paquete($data);

		header('Location: http://localhost/hotelcaninoreyes/index.php/inventario');
	}

}

/* End of file inventario.php */
/* Location: ./application/controllers/inventario.php */