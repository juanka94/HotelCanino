<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administradores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('administradores_model');
		$this->load->model('usuarios_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if(!$this->session->userdata('logged_user')){
			redirect('administradores/login');
		}else{

		$data['reservacion'] = $this->administradores_model->res_entrantes();

		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/reservaciones/tabla',$data);
		$this->load->view('administrador/layers/footer');
		}		
	}

	public function usuarios()
	{
		$data['usuarios'] = $this->administradores_model->get_usuarios();

		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/usuario/usuarios',$data);
		$this->load->view('administrador/layers/footer');
	}
	//NUEVO
	public function ver_usuario()
	{
		$us_id = $this->uri->segment(3);

		$query = $this->administradores_model->ver_usuario($us_id);

		foreach ($query as $key) {
			$data['usuario'] = array(
				'id' => $key->us_id,
				'nombre'=> $key->us_nombre,
				'paterno'=> $key->us_ap_paterno,
				'materno'=> $key->us_ap_materno,
				'correo' => $key->us_email,
				'password' => $key->us_password,
				'casa'=> $key->us_tel_casa,
				'cel'=> $key->us_tel_cel,
				'calle'=> $key->us_dom_calle,
				'localidad'=> $key->us_dom_localidad,
				'municipio'=> $key->us_dom_municipio,
				'estado'=> $key->us_dom_estado,
				'tipo'=> $key->us_tipo
			);
		}

		$query = $this->administradores_model->us_mascota($us_id);

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

		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/usuario/ver_usuario',$data);
		$this->load->view('administrador/layers/footer');
	}

	public function upgrade()
	{
		$us_id = $this->uri->segment(3);

		$query = $this->administradores_model->upgrade($us_id);

		header('Location: http://localhost/hotelcaninoreyes/index.php/administradores/ver_usuario/'.$us_id);	
	}

	public function modificar_usuario()
	{
		$us_id = $this->uri->segment(3);

		$query = $this->administradores_model->ver_usuario($us_id);

		foreach ($query as $key) {
			$data['usuario'] = array(
				'id' => $key->us_id,
				'nombre'=> $key->us_nombre,
				'paterno'=> $key->us_ap_paterno,
				'materno'=> $key->us_ap_materno,
				'correo' => $key->us_email,
				'password' => $key->us_password,
				'casa'=> $key->us_tel_casa,
				'cel'=> $key->us_tel_cel,
				'calle'=> $key->us_dom_calle,
				'localidad'=> $key->us_dom_localidad,
				'municipio'=> $key->us_dom_municipio,
				'estado'=> $key->us_dom_estado,
				'tipo'=> $key->us_tipo
			);
		}

		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/usuario/modificar_usuario',$data);
		$this->load->view('administrador/layers/footer');
	}

	public function update_usuario()
	{
		$us_id = $this->input->post('us_id');
		$data['us_nombre'] = $this->input->post('nom_usuario');
		$data['us_ap_paterno'] = $this->input->post('ap_paterno');
		$data['us_ap_materno'] = $this->input->post('ap_materno');
		$data['us_email'] = $this->input->post('email');
		$data['us_password'] = $this->input->post('password');
		$data['us_tel_casa'] = $this->input->post('tel_casa');
		$data['us_tel_cel'] = $this->input->post('tel_celular');
		$data['us_dom_calle'] = $this->input->post('dom_calle');
		$data['us_dom_localidad'] = $this->input->post('localidad');
		$data['us_dom_municipio'] = $this->input->post('municipio');
		$data['us_dom_estado'] = $this->input->post('estado');
		$data['us_tipo'] = $this->input->post('tipo');

		var_dump($us_id);
		var_dump($data);

		$this->administradores_model->update_usuario($us_id, $data);

		header('Location: http://localhost/hotelcaninoreyes/index.php/administradores/ver_usuario/'.$us_id);
	}

	public function eliminar_usuario()
	{
		$data['us_id'] = $this->uri->segment(3);

		$this->administradores_model->eliminar_usuario($data);

		header('Location: http://localhost/hotelcaninoreyes/index.php/administradores/Usuarios');
	}
	//NUEVO
	public function crear_admin()
	{
		if(!$this->session->userdata('logged_user')){
			redirect('administradores/login');
		}else{
		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/usuario/crear_usuario');
		$this->load->view('administrador/layers/footer');
		}	
	}

	public function add_administrador()
	{
		if(!empty($_POST)) {
			$data = array(
				'admin_nombre'=> $this->input->post('nombre_admin'),
				'admin_password'=> $this->input->post('password_admin'),
				'admin_tipo'=> $this->input->post('tipos_admin')
				
				);
		}
		if($this->administradores_model->add_administrador($data))
		redirect('administradores/usuarios');
		}

		public function login() {

		$data = array();
		$this->form_validation->set_rules('name', 'nombre', 'required');
		$this->form_validation->set_rules('password', 'Contraseña', 'required');
		$this->form_validation->set_message('required', '<div class="alert alert-danger">El campo %s es requerido.</div>');
		
		if(!empty($_POST)) {
			
			if ($this->form_validation->run() == TRUE) {
				
				$logged_user = $this->administradores_model->get($_POST['name'], $_POST['password']);

				if($logged_user) {
					$this->session->set_userdata('logged_user', $logged_user);
					redirect('administradores/index');
				} else {
					redirect('administradores/login');
				}
			}
		}
		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/usuario/login');
		$this->load->view('administrador/layers/footer');	
	}

	public function logout() {
		$this->session->unset_userdata('logged_user');
		$this->session->sess_destroy();
		redirect('administradores/login');
	}

	public function add_cliente()
	{
		if(!empty($_POST)) {
			$data = array(
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
		if($this->administradores_model->insertar_cliente($data))
		redirect('administradores/usuarios');
		
	}

	public function crear_cliente()
	{
		if(!$this->session->userdata('logged_user')){
			redirect('administradores/login');
		}else{
		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/usuario/crear_cliente');
		$this->load->view('administrador/layers/footer');
		}
	}

	public function editar_admin(){
    $data = array('admin_nombre' => $_POST['nombre'] ,
                  'admin_password' => $_POST['password'],
                  'admin_tipo' => $_POST['tipos'],  
                ); 
    $this->administradores_model->actualizar_user_admin($data);
    redirect('administradores/perfil');    
  	}

	public function perfil()
	{
		if (!$this->session->userdata('logged_user')){
	        redirect('administradores/login');
	    }else{
	    	$this->load->view('administrador/layers/header');
			$this->load->view('administrador/layers/menu');
	    	$datos = $this->session->userdata('logged_user');
	    	$id = $datos->admin_id;
			$usuario = $this->administradores_model->obtener_user_admin($id);  
			    $Datousuario = array();
			    foreach($usuario as $item){
			        $itemUsuario = array();
			        $itemUsuario['admin_nombre'] = $item['admin_nombre'];
			        $itemUsuario['admin_password'] = $item['admin_password'];
			        $itemUsuario['admin_tipo'] = $item['admin_tipo'];
			        $Datousuario[] = $itemUsuario;
			    }
			    $data = array(
			        'usuario' => $Datousuario
			    ); 
			    $this->load->view('administrador/usuario/perfil_admin',$data);
			    $this->load->view('administrador/layers/footer');	
		}
	}

	public function enviar_correo()
	{
		$us_id = $this->uri->segment(3);

		$query = $this->administradores_model->ver_usuario($us_id);

		foreach ($query as $key) {
			$data['usuario'] = array(
				'id' => $key->us_id,
				'nombre'=> $key->us_nombre,
				'paterno'=> $key->us_ap_paterno,
				'materno'=> $key->us_ap_materno,
				'correo' => $key->us_email
				);
		}
		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/usuario/enviar_correo',$data);
		$this->load->view('administrador/layers/footer');
	}


	//Funciones generar PDF

	
}

/* End of file administradores.php */
/* Location: ./application/controllers/administradores.php */