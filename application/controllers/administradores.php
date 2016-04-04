<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administradores extends CI_Controller {

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
		if(!$this->session->userdata('logged_admin')){
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
				);
				$num++;
			}
			
		}else{
			$data['mascota']=0;
		}
		
		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/usuario/ver_usuario',$data);
		$this->load->view('administrador/layers/footer');
	}

	public function form_mascota()
	{
		$data['us_id'] = $this->uri->segment(3);

		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/usuario/form_mascota',$data);
		$this->load->view('administrador/layers/footer');
	}

	public function form_mascota2()
	{
		$mas_id = $this->uri->segment(3);

		$query = $this->administradores_model->ver_mascota($mas_id);

		foreach ($query as $key) {
			$data['mascota'] = array(
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
				'id_us' => $key->mas_id_usuario
			);
		}

		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/usuario/form_mascota2',$data);
		$this->load->view('administrador/layers/footer');
	}

	public function agregar_mascota()
	{
		$insert = array(
			'mas_nombre' => $this->input->post('nombre'),
			'mas_size' => $this->input->post('tamaño'),
			'mas_raza' => $this->input->post('raza'),
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

		redirect('administradores/ver_usuario/'.$insert['mas_id_usuario']);
	}

	public function modificar_mascota()
	{
		$update = array(
			'mas_nombre' => $this->input->post('nombre'),
			'mas_size' => $this->input->post('tamaño'),
			'mas_raza' => $this->input->post('raza'),
			'mas_genero' => $this->input->post('sexo'),
			'mas_color' => $this->input->post('color'),
			'mas_edad' => $this->input->post('edad'),
			'mas_hora_comida' => $this->input->post('comida'),
			'mas_esterilizado' => $this->input->post('esterlilizado'),
			'mas_agresivo' => $this->input->post('agresivo'),
			'mas_medicamento' => $this->input->post('medicamento'),
			'mas_observaciones' => $this->input->post('observaciones'),
		);

		$mas_id = $this->input->post('mas_id');

		$this->administradores_model->update_mascota($mas_id, $update);

		$us_id = $this->input->post('us_id');

		redirect('administradores/ver_usuario/'.$us_id);
	}

	public function eliminar_mascota()
	{
		$data['mas_id'] = $this->uri->segment(3);
		$us_id = $this->uri->segment(4);

		$this->administradores_model->eliminar_mascota($data);

		redirect('administradores/ver_usuario/'.$us_id);
	}

	public function upgrade()
	{
		$us_id = $this->uri->segment(3);

		$query = $this->administradores_model->upgrade($us_id);

		header('Location: http://localhost/HotelCanino/index.php/administradores/ver_usuario/'.$us_id);	
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

		$this->administradores_model->update_usuario($us_id, $data);

		header('Location: http://localhost/HotelCanino/index.php/administradores/ver_usuario/'.$us_id);
	}

	public function eliminar_usuario()
	{
		$data['us_id'] = $this->uri->segment(3);

		$this->administradores_model->eliminar_usuario($data);

		header('Location: http://localhost/HotelCanino/index.php/administradores/Usuarios');
	}
	//NUEVO
	public function crear_admin()
	{
		if(!$this->session->userdata('logged_admin')){
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
				
				$logged_admin = $this->administradores_model->get($_POST['name'], $_POST['password']);

				if($logged_admin) {
					$this->session->set_userdata('logged_admin', $logged_admin);
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
		$this->session->unset_userdata('logged_admin');
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
		if(!$this->session->userdata('logged_admin')){
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
		if (!$this->session->userdata('logged_admin')){
	        redirect('administradores/login');
	    }else{
	    	$this->load->view('administrador/layers/header');
			$this->load->view('administrador/layers/menu');
	    	$datos = $this->session->userdata('logged_admin');
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

	public function enviar_correo_vista()
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


	public function enviar_correo_info()
	{
		$this->load->library('email');
		$de_email= $this->input->post('de_email');
		$para_email=$this->input->post('para_email');
		$mensaje_email=$this->input->post('mensaje_email');

		$this->email->from($de_email, 'Hotel Canino');
		$this->email->to($para_email);
		
		$this->email->subject('Recordatorio Hotel Canino');
		$this->email->message($mensaje_email);
		
		if($this->email->send()){
			redirect('administradores/usuarios');
		}else{
			redirect('administradores/index');
		}

	}

	public function galeria()
	{
		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/layers/galeria');
		$this->load->view('administrador/layers/footer');
	}

	public function agregar_galeria()
	{
		$mi_imagen ='imagen_galeria';
        $config['upload_path'] = APPPATH . '..\assets\user\images\imagenes\galeria';
        $config['file_name'] = "img_1";
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

		$this->load->library('upload', $config);

        if (!$this->upload->do_upload($mi_imagen)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }else{

        $data['uploadSuccess'] = $this->upload->data();
		}	

		if($this->administradores_model->insertar_imagen($mi_imagen));
		redirect('usuarios','galeria');

	}

	
}

/* End of file administradores.php */
/* Location: ./application/controllers/administradores.php */